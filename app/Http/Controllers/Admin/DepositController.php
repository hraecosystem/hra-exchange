<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\ListBuilders\Admin\DepositListBuilder;
use App\Models\Deposit;
use App\Models\EuroWalletTransaction;
use App\Models\IcoDetail;
use App\Models\IcoPurchase;
use App\Models\Member;
use App\Traits\CoinTrait;
use Brick\Math\BigDecimal;
use Brick\Math\RoundingMode;
use DB;
use Exception;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;
use Throwable;
use Web3\Providers\HttpProvider;
use Web3\RequestManagers\HttpRequestManager;
use Web3\Utils;
use Web3\Web3;

class DepositController extends Controller
{
    use CoinTrait;

    /**
     * @throws Exception
     */
    public function index(Request $request): Renderable|JsonResponse|RedirectResponse
    {
        return DepositListBuilder::render(name: 'Buy '.env('APP_CURRENCY'));
    }

    /**
     * @throws ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        $this->validate($request, [
            'code' => [
                'required',
                function ($attribute, $value, $fail) {
                    if (! Member::whereCode($value)->notBlocked()->exists()) {
                        $fail('User ID is invalid or blocked');
                    }
                },
            ],
            'transaction_hash' => 'required|unique:deposits|regex:/^0x([A-Fa-f0-9]{64})$/',
        ], [
            'code.required' => 'User ID is required',
            'transaction_hash.required' => 'The Tx Hash required',
            'transaction_hash.unique' => 'The tx hash has already been taken',
            'transaction_hash.regex' => 'The tx hash format is invalid',
        ]);

        try {
            return DB::transaction(function () use ($request) {
                $transactionHash = strtolower($request->input('transaction_hash'));

                if (Deposit::whereTransactionHash($transactionHash)
                    ->lockForUpdate()
                    ->exists()
                ) {
                    return redirect()->back()->with(['error' => 'The transaction hash has already been taken']);
                }

                $member = Member::whereCode($request->input('code'))
                    ->lockForUpdate()
                    ->first();

                $rpcUrl = env('BSC_RPC_URL');
                $httpProvider = new HttpProvider(new HttpRequestManager($rpcUrl, 15));
                $web3 = new Web3($httpProvider);

                $transactionReceipt = null;
                $web3->eth->getTransactionReceipt($transactionHash, function ($err, $receipt) use (&$transactionReceipt) {
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
                    $fromAddress = $transactionReceipt->from;
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
                        return redirect()->back()->with(['error' => 'Not transfer to '.env('APP_CURRENCY').' contract']);
                    }

                    if ($toAddress != strtolower($toAddress)) {
                        return redirect()->back()->with(['error' => 'Not transfer to correct company deposit address']);
                    }

                    if (! $amount->isGreaterThanOrEqualTo(settings('min_deposit'))) {
                        return redirect()->back()->with(['error' => 'Transfer amount must be at least '.settings('min_deposit')]);
                    }

                    if (strtolower(env('VITE_USDT_CONTRACT_ADDRESS')) === strtolower($coinContractAddress)
                        && $amount->isGreaterThanOrEqualTo(settings('min_deposit'))
                    ) {
                        $activeICO = IcoDetail::where('status', IcoDetail::STATUS_ACTIVE)->first();

                        $coinAmount = $this->calculateEuroCoins($amount->__toString());

                        $deposit = Deposit::create([
                            'member_id' => $member->id,
                            'ico_detail_id' => $activeICO?->id,
                            'from_address' => $fromAddress,
                            'to_address' => $toAddress,
                            'amount' => $coinAmount,
                            'coin_price' => $this->calculateCoinsPrice() ?? 0,
                            'euro_amount' => $amount->__toString(),
                            'transaction_hash' => $transactionHash,
                            'order_no' => Deposit::generateRandomOrderNo(),
                            'block_no' => $blockNumber,
                            'bonus' => 0,
                            'status' => Deposit::STATUS_COMPLETED,
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

                        return redirect()->route('admin.deposit.index')->with(['success' => 'Deposit process successfully']);
                    }
                } else {
                    return redirect()->back()->with(['error' => 'Transaction details not found']);
                }
            });

        } catch (Throwable $e) {
            return $this->logExceptionAndRespond($e);
        }
    }

    public function create(): Renderable|JsonResponse|RedirectResponse
    {
        return view('admin.deposit.create');
    }
}
