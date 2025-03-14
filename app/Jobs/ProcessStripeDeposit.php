<?php

namespace App\Jobs;

use App\Models\Deposit;
use App\Models\EuroWalletTransaction;
use App\Models\IcoPurchase;
use DB;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\Middleware\WithoutOverlapping;
use Illuminate\Queue\SerializesModels;
use Stripe\StripeClient;
use Throwable;

class ProcessStripeDeposit implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     */
    public function __construct(public Deposit $deposit)
    {
        //
    }

    public function middleware(): array
    {
        return [new WithoutOverlapping($this->deposit->id)];
    }

    /**
     * Execute the job.
     *
     * @throws Throwable
     */
    public function handle(): void
    {
        DB::transaction(function () {
            $deposit = Deposit::whereStatus(Deposit::STATUS_PENDING)
                ->wherePgType(Deposit::PG_TYPE_STRIPE)
                ->lockForUpdate()
                ->find($this->deposit->id);

            if ($deposit) {
                $stripe = new StripeClient(env('STRIPE_SECRET_KEY'));

                $checkoutSession = $stripe->checkout->sessions->retrieve($this->deposit->pg_id);

                if ($checkoutSession->status === 'expired' && $checkoutSession->payment_status === 'unpaid') {
                    $deposit->update([
                        'status' => Deposit::STATUS_EXPIRED,
                    ]);
                } elseif ($checkoutSession->status === 'complete' && $checkoutSession->payment_status === 'paid') {
                    $deposit->update([
                        'status' => Deposit::STATUS_COMPLETED,
                    ]);

                    $deposit->euroWalletTransaction()->create([
                        'member_id' => $deposit->member->id,
                        'opening_balance' => $deposit->member->euro_wallet_balance,
                        'closing_balance' => $deposit->member->euro_wallet_balance + $deposit->euro_amount,
                        'amount' => $deposit->euro_amount,
                        'service_charge' => 0,
                        'total' => $deposit->euro_amount,
                        'comment' => toHumanReadable($deposit->euro_amount).' Euro Deposited',
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
        });
    }
}
