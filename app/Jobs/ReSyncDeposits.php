<?php

namespace App\Jobs;

use App\Models\UserWallet;
use Brick\Math\BigDecimal;
use Brick\Math\RoundingMode;
use Exception;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\Middleware\WithoutOverlapping;
use Illuminate\Queue\SerializesModels;
use Web3\Providers\HttpProvider;
use Web3\RequestManagers\HttpRequestManager;
use Web3\Utils;
use Web3\Web3;

class ReSyncDeposits implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public int $tries = 1;

    public int $timeout = 58;

    protected Web3 $web3;

    protected string $transferTopic;

    /**
     * Create a new job instance.
     */
    public function __construct()
    {
        //
    }

    public function middleware(): array
    {
        return [
            (new WithoutOverlapping(self::class))
                ->dontRelease()
                ->expireAfter(59),
        ];
    }

    /**
     * Execute the job.
     *
     * @throws Exception
     */
    public function handle(): void
    {
        $startTime = now();

        $rpcUrl = env('BSC_RPC_URL');
        $httpProvider = new HttpProvider(new HttpRequestManager($rpcUrl, 15));
        $this->web3 = new Web3($httpProvider);
        $this->transferTopic = Utils::sha3('Transfer(address,address,uint256)');

        $lastProcessedBlock = settings('processed_block');

        $latestBlock = null;
        $this->web3->eth->blockNumber(function ($err, $blockNumber) use (&$latestBlock) {
            if ($err) {
                throw new Exception($err->getMessage());
            }

            $latestBlock = Utils::toBn($blockNumber)->toString();
        });

        $blockToProcess = $lastProcessedBlock ? $lastProcessedBlock + 1 : $latestBlock - 1;

        while ($latestBlock > $blockToProcess && $startTime->diffInSeconds(now()) < 55) {
            $this->processBlock($blockToProcess);

            settings(['processed_block' => $blockToProcess]);

            $blockToProcess++;
        }
    }

    /**
     * @throws Exception
     */
    private function processBlock(mixed $blockToProcess): void
    {
        $this->web3->eth->getLogs([
            'fromBlock' => Utils::toHex($blockToProcess, true),
            'toBlock' => Utils::toHex($blockToProcess, true),
            'address' => [strtolower(env('VITE_USDT_CONTRACT_ADDRESS'))],
            'topics' => [$this->transferTopic],
        ], function ($err, $events) {
            if ($err) {
                throw new Exception($err->getMessage());
            }

            // Process transfer events
            foreach ($events as $event) {
                $transactionHash = strtolower($event->transactionHash);

                $toAddress = strtolower(str_replace('000000000000000000000000', '', $event->topics[2]));
                $amount = BigDecimal::of(
                    Utils::toBn('0x'.substr($event->data, 2))->toString()
                )
                    ->dividedBy(
                        10 ** env('USDT_CONTRACT_DECIMAL'),
                        env('USDT_CONTRACT_DECIMAL'),
                        RoundingMode::HALF_EVEN
                    );

                $minDepositAmount = settings('min_deposit');

                // Check if the transaction was sent to one of the user's address
                if ($amount->isGreaterThanOrEqualTo($minDepositAmount) && UserWallet::wherePublicKey($toAddress)->exists()) {
                    ProcessWalletDeposit::dispatch($transactionHash);
                }
            }
        });
    }
}
