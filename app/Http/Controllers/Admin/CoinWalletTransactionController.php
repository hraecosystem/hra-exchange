<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\ListBuilders\Admin\CoinWalletTransactionListBuilder;
use App\Models\Admin;
use App\Models\CoinWalletTransaction;
use App\Models\IcoDetail;
use App\Models\Member;
use App\Traits\CoinTrait;
use Auth;
use Carbon\Carbon;
use DB;
use Exception;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;
use Throwable;

class CoinWalletTransactionController extends Controller
{
    use CoinTrait;

    /**
     * @throws Exception
     */
    public function index(Request $request): Renderable|JsonResponse|RedirectResponse
    {
        return CoinWalletTransactionListBuilder::render(name: env('APP_CURRENCY').' Wallet Transactions');
    }

    public function create(): Renderable|RedirectResponse
    {
        return view('admin.coin-wallet-transactions.create', [
            'types' => CoinWalletTransaction::TYPES,
            'recentTransactions' => CoinWalletTransaction::whereResponsibleType(Admin::class)
                ->with(['member.user'])
                ->latest('id')
                ->take(10)
                ->get(),
        ]);
    }

    /**
     * @throws ValidationException
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'amount' => 'required|numeric|min:1',
            'type' => 'required|in:'.implode(',', array_keys(CoinWalletTransaction::TYPES)),
            'code' => [
                'required',
                function ($attribute, $value, $fail) {
                    if (! Member::whereCode($value)->notBlocked()->exists()) {
                        $fail('User ID is invalid or blocked');
                    }
                },
            ],
        ], [
            'code.required' => 'User ID is required',
            'amount.min' => 'The amount must be at least 1',
            'amount.required' => 'The amount is required',
            'amount.numeric' => 'The amount must be number',
        ]);

        try {
            return DB::transaction(function () use ($request) {
                $amount = $request->get('amount');
                $member = Member::whereCode($request->input('code'))->first();

                if ($request->get('type') == CoinWalletTransaction::TYPE_DEBIT) {
                    if ($member->coin_wallet_balance < $amount) {
                        return redirect()->back()
                            ->with(['error' => 'User does not have enough balance for this transaction'])
                            ->withInput();
                    }

                    $type = CoinWalletTransaction::TYPE_DEBIT;
                    $closingBalance = $member->coin_wallet_balance - $amount;
                    $successMessage = 'Wallet debited successfully';
                } else {
                    $type = CoinWalletTransaction::TYPE_CREDIT;
                    $closingBalance = $member->coin_wallet_balance + $amount;
                    $successMessage = 'Wallet credited successfully';
                }

                $member->coinWalletTransactions()->create([
                    'member_id' => $member->id,
                    'opening_balance' => $member->coin_wallet_balance,
                    'closing_balance' => $closingBalance,
                    'amount' => $amount,
                    'service_charge' => 0.00,
                    'euro_amount' => 0,
                    'total' => $amount,
                    'type' => $type,
                    'responsible_id' => Auth::user()->id,
                    'responsible_type' => Admin::class,
                    'comment' => $request->get('comment'),
                ]);

                $icoDetail = IcoDetail::where('status', IcoDetail::STATUS_ACTIVE)->first();
                if ($icoDetail) {
                    if ($type === CoinWalletTransaction::TYPE_CREDIT) {
                        $icoDetail->increment('total_purchase', $amount);
                    } elseif ($type === CoinWalletTransaction::TYPE_DEBIT) {
                        $icoDetail->decrement('total_purchase', $amount);
                    }

                    $icoDetail->refresh();

                    if ($icoDetail->total_purchase >= $icoDetail->supply) {
                        $icoDetail->status = IcoDetail::STATUS_EXPIRED;
                        $icoDetail->save();
                        $nextIcoDetail = IcoDetail::where('id', $icoDetail->id + 1)->first();
                        if ($nextIcoDetail) {
                            $nextIcoDetail->status = IcoDetail::STATUS_ACTIVE;
                            $nextIcoDetail->start_date = now();
                            $nextIcoDetail->end_date = Carbon::parse(now())->addDays($nextIcoDetail->days);
                            $nextIcoDetail->save();
                        }
                    }
                }

                return redirect()->back()->with(['success' => $successMessage]);
            });
        } catch (Throwable $e) {
            return $this->logExceptionAndRespond($e);
        }
    }
}
