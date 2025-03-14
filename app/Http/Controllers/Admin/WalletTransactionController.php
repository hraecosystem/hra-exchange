<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\ListBuilders\Admin\EUROWalletTransactionListBuilder;
use App\Models\Admin;
use App\Models\EuroWalletTransaction;
use App\Models\Member;
use Auth;
use DB;
use Exception;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;
use Throwable;

class WalletTransactionController extends Controller
{
    /**
     * @throws Exception
     */
    public function index(Request $request): Renderable|JsonResponse|RedirectResponse
    {
        return EUROWalletTransactionListBuilder::render(name: 'EURO Wallet Transactions');
    }

    public function create(): Renderable|RedirectResponse
    {
        return view('admin.wallet-transactions.create', [
            'types' => EuroWalletTransaction::TYPES,
            'recentTransactions' => EuroWalletTransaction::whereResponsibleType(Admin::class)
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
            'type' => 'required|in:'.implode(',', array_keys(EuroWalletTransaction::TYPES)),
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
                $member = Member::whereCode($request->get('code'))->first();

                if ($request->get('type') == EuroWalletTransaction::TYPE_DEBIT) {
                    if ($member->euro_wallet_balance < $amount) {
                        return redirect()->back()
                            ->with(['error' => 'User does not have enough balance for this transaction'])
                            ->withInput();
                    } else {
                        $type = EuroWalletTransaction::TYPE_DEBIT;
                        $closingBalance = $member->euro_wallet_balance - $amount;
                        $successMessage = 'Wallet debited successfully';
                    }
                } else {
                    $type = EuroWalletTransaction::TYPE_CREDIT;
                    $closingBalance = $member->euro_wallet_balance + $amount;
                    $successMessage = 'Wallet credited successfully';
                }

                $transaction = $member->walletTransactions()->create([
                    'member_id' => $member->id,
                    'opening_balance' => $member->euro_wallet_balance,
                    'closing_balance' => $closingBalance,
                    'amount' => $amount,
                    'service_charge' => 0.00,
                    'total' => $amount,
                    'type' => $type,
                    'responsible_id' => Auth::user()->id,
                    'responsible_type' => Admin::class,
                    'comment' => $request->get('comment'),
                ]);

                return redirect()->back()->with(['success' => $successMessage]);
            });
        } catch (Throwable $e) {
            return $this->logExceptionAndRespond($e);
        }
    }
}
