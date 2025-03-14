<?php

namespace App\Jobs;

use App\Models\Deposit;
use App\Models\EuroWalletTransaction;
use App\Models\IcoDetail;
use App\Models\IcoPurchase;
use App\Traits\CoinTrait;
use Brick\Math\BigDecimal;
use Brick\Math\RoundingMode;
use DB;
use Exception;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Throwable;
use Web3\Providers\HttpProvider;
use Web3\RequestManagers\HttpRequestManager;
use Web3\Utils;
use Web3\Web3;

class ProcessWalletDeposit implements ShouldQueue
{
    use CoinTrait;
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    private Deposit $deposit;

    /**
     * Create a new job instance.
     */
    public function __construct(Deposit $deposit)
    {
        $this->deposit = $deposit;
    }

    /**
     * Execute the job.
     *
     * @throws Throwable
     */
    public function handle(): void
    {
        DB::transaction(function () {
            $deposit = $this->deposit;
            if (
                Deposit::whereId($deposit->id)->lockForUpdate()->exists()
                &&
                $this->deposit->blockchain_status == Deposit::STATUS_PENDING
            ) {
                $activeICO = IcoDetail::where('status', IcoDetail::STATUS_ACTIVE)->first();
                if ($activeICO) {
                    $minDeposit = $activeICO->min_buy;
                } else {
                    $minDeposit = settings('min_deposit');
                }

                $rpcUrl = env('BSC_RPC_URL');
                $httpProvider = new HttpProvider(new HttpRequestManager($rpcUrl, 15));
                $web3 = new Web3($httpProvider);

                $transaction = null;
                $web3->eth->getTransactionByHash($deposit->transaction_hash, function ($err, $receipt) use (&$transaction) {
                    if ($err) {
                        throw new Exception($err->getMessage());
                    }

                    $transaction = $receipt;
                });

                $transactionReceipt = null;
                $web3->eth->getTransactionReceipt($deposit->transaction_hash, function ($err, $receipt) use (&$transactionReceipt) {
                    if ($err) {
                        throw new Exception($err->getMessage());
                    }

                    $transactionReceipt = $receipt;
                });

                if (
                    $transactionReceipt
                    && $transactionReceipt->to
                    && $transactionReceipt->from
                    && $transactionReceipt->logs
                    && count($transactionReceipt->logs) > 0
                    && $transactionReceipt->logs[0]->topics
                    && count($transactionReceipt->logs[0]->topics) > 2
                    && $transactionReceipt->logs[0]->data
                ) {
                    $coinContractAddress = $transactionReceipt->to;
                    $blockNumber = Utils::toBn($transactionReceipt->blockNumber)->toString();
                    $toAddress = strtolower('0x'.substr($transactionReceipt->logs[0]->topics[2], -40));
                    $amount = BigDecimal::of(
                        Utils::toBn('0x'.substr($transactionReceipt->logs[0]->data, 2))->toString()
                    )
                        ->dividedBy(
                            10 ** env('USDT_CONTRACT_DECIMAL'),
                            env('USDT_CONTRACT_DECIMAL'),
                            RoundingMode::HALF_EVEN
                        );

                    if (strtolower(env('VITE_USDT_CONTRACT_ADDRESS')) != strtolower($coinContractAddress)) {
                        $deposit->update([
                            'blockchain_status' => Deposit::STATUS_FAILED,
                            'remark' => 'Not transfer to '.env('APP_CURRENCY').' contract',
                        ]);

                        return '';
                    }

                    if ($toAddress != strtolower($deposit->to_address)) {
                        $deposit->update([
                            'blockchain_status' => Deposit::STATUS_FAILED,
                            'remark' => 'Not transfer to correct company deposit address',
                        ]);

                        return '';
                    }

                    if (! $amount->isGreaterThanOrEqualTo($minDeposit)) {
                        $deposit->update([
                            'blockchain_status' => Deposit::STATUS_FAILED,
                            'remark' => 'Transfer amount must be at least '.$minDeposit,
                        ]);

                        return '';
                    }

                    if (strtolower(env('VITE_USDT_CONTRACT_ADDRESS')) === strtolower($coinContractAddress)
                        && $amount->isGreaterThanOrEqualTo($minDeposit)
                    ) {
                        $deposit->update([
                            'block_no' => $blockNumber,
                            'bonus' => 0,
                            'blockchain_status' => Deposit::STATUS_COMPLETED,
                            'receipt' => $transactionReceipt,
                        ]);

                        $deposit->euroWalletTransaction()->create([
                            'member_id' => $deposit->member->id,
                            'opening_balance' => $deposit->member->euro_wallet_balance,
                            'closing_balance' => $deposit->member->euro_wallet_balance + $deposit->euro_amount,
                            'amount' => $deposit->euro_amount,
                            'service_charge' => 0,
                            'total' => $deposit->euro_amount,
                            'comment' => toHumanReadable($deposit->euro_amount).' EURO Deposited',
                            'type' => EuroWalletTransaction::TYPE_CREDIT,
                        ]);

                        $icoPurchase = IcoPurchase::create([
                            'member_id' => $deposit->member_id,
                            'ico_detail_id' => $deposit->ico_detail_id,
                            'deposit_id' => $deposit->id,
                            'amount' => $deposit->amount,
                            'coin_price' => $deposit->coin_price,
                            'euro_amount' => $deposit->euro_amount,
                        ]);

                        $icoPurchase->coinWalletTransaction()->create([
                            'member_id' => $icoPurchase->member->id,
                            'opening_balance' => $icoPurchase->member->coin_wallet_balance,
                            'closing_balance' => $icoPurchase->member->coin_wallet_balance + $icoPurchase->amount,
                            'amount' => $icoPurchase->amount,
                            'euro_amount' => 0,
                            'service_charge' => 0,
                            'total' => $icoPurchase->amount,
                            'comment' => toHumanReadable($icoPurchase->amount).' HRA Deposited',
                            'type' => EuroWalletTransaction::TYPE_CREDIT,
                        ]);

                        $icoPurchase->euroWalletTransaction()->create([
                            'member_id' => $icoPurchase->member->id,
                            'opening_balance' => $icoPurchase->member->euro_wallet_balance,
                            'closing_balance' => $icoPurchase->member->euro_wallet_balance - $icoPurchase->euro_amount,
                            'amount' => $icoPurchase->euro_amount,
                            'service_charge' => 0,
                            'total' => $icoPurchase->euro_amount,
                            'comment' => 'Debited '.toHumanReadable($icoPurchase->euro_amount).' EURO for '.toHumanReadable($icoPurchase->amount).' '.env('APP_CURRENCY').' purchase',
                            'type' => EuroWalletTransaction::TYPE_DEBIT,
                        ]);
                    }
                }
            }
        }, 5);
    }
}
