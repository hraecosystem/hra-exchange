<?php

namespace App\Http\Controllers\Member;

use App\Http\Controllers\Controller;
use App\ListBuilders\Member\P2PTransferListBuilder;
use App\Models\EuroWalletTransaction;
use App\Models\Member;
use App\Models\P2PTransfer;
use App\Models\User;
use Brick\Math\Exception\MathException;
use Brick\Math\Exception\RoundingNecessaryException;
use Exception;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\ValidationException;
use Throwable;

class P2PTransferController extends Controller
{
    /**
     * @throws Exception
     */
    public function index(): RedirectResponse|Renderable|JsonResponse
    {
        return P2PTransferListBuilder::render(['member_id' => $this->member->id]);
    }

    /**
     * @throws MathException
     * @throws RoundingNecessaryException
     */
    public function create(): Renderable|JsonResponse|RedirectResponse
    {
        return view('member.p2p-transfers.create', ['coinBalance' => toHumanReadable($this->member->coin_wallet_balance)]);
    }

    /**
     * @throws Throwable
     * @throws ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        $this->validate($request, [
            'to_email_code' => [
                'required',
                function ($attribute, $value, $fail) {
                    if (! $user = User::whereEmail($value)->orWhereHas('member', fn ($query) => $query->whereCode($value))->first()) {
                        $fail('User not found.');
                    } elseif ($user->member->isBlocked()) {
                        $fail('User blocked');
                    }
                },
            ],
            'amount' => 'required|numeric|min:1',
        ], [
            'to_email_code.required' => 'To Email Or Code is required',
            'amount.required' => 'Amount is required',
            'amount.numeric' => 'Amount can only be a number',
            'amount.min' => 'Amount should be more than 0',
        ]);

        try {
            return DB::transaction(function () use ($request) {
                $fromUser = $this->user;
                $fromMember = Member::whereUserId($fromUser->id)->lockForUpdate()->first();

                $toUser = User::whereEmail($request->input('to_email_code'))
                    ->orWhereHas('member', fn ($query) => $query->whereCode($request->input('to_email_code')))
                    ->firstOrFail();
                $toMember = $toUser->member;

                if ($fromMember->id === $toMember->id) {
                    return redirect()->back()->with(['error' => 'Cannot send to yourself.']);
                }

                $amount = $request->input('amount');

                if ($fromMember->coin_wallet_balance < $amount) {
                    return redirect()->back()->with(['error' => 'Insufficient coin balance.']);
                }

                $p2pTransfer = P2PTransfer::create([
                    'from_member_id' => $fromMember->id,
                    'to_member_id' => $toMember->id,
                    'amount' => $amount,
                ]);

                $p2pTransfer->coinWalletTransactions()->create([
                    'member_id' => $fromMember->id,
                    'opening_balance' => $fromMember->coin_wallet_balance,
                    'closing_balance' => $fromMember->coin_wallet_balance - $amount,
                    'amount' => $amount,
                    'euro_amount' => 0,
                    'service_charge' => 0,
                    'total' => $amount,
                    'comment' => sprintf(
                        'P2P Transfer of %s HRA from %s to %s',
                        toHumanReadable($amount),
                        $fromUser->email,
                        $toUser->email
                    ),
                    'type' => EuroWalletTransaction::TYPE_DEBIT,
                ]);

                $p2pTransfer->coinWalletTransactions()->create([
                    'member_id' => $toMember->id,
                    'opening_balance' => $toMember->coin_wallet_balance,
                    'closing_balance' => $toMember->coin_wallet_balance + $amount,
                    'amount' => $amount,
                    'euro_amount' => 0,
                    'service_charge' => 0,
                    'total' => $amount,
                    'comment' => sprintf(
                        'P2P Transfer of %s HRA from %s to %s',
                        toHumanReadable($amount),
                        $fromUser->email,
                        $toUser->email
                    ),
                    'type' => EuroWalletTransaction::TYPE_CREDIT,
                ]);

                return redirect()->route('member.p2p-transfers.index')->with(['success' => 'P2P Transfer successfully created.']);
            });

        } catch (Throwable $e) {
            return $this->logExceptionAndRespond($e);
        }
    }
}
