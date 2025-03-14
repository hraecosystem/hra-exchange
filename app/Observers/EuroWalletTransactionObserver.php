<?php

namespace App\Observers;

use App\Models\EuroWalletTransaction;

class EuroWalletTransactionObserver
{
    /**
     * Handle the wallet transaction "created" event.
     *
     * @return void
     */
    public function created(EuroWalletTransaction $walletTransaction)
    {
        if ($walletTransaction->type == EuroWalletTransaction::TYPE_CREDIT) {
            $walletTransaction->member->increment('euro_wallet_balance', $walletTransaction->total);
        } elseif ($walletTransaction->type == EuroWalletTransaction::TYPE_DEBIT) {
            $walletTransaction->member->decrement('euro_wallet_balance', $walletTransaction->total);
        }
    }

    /**
     * Handle the wallet transaction "updated" event.
     *
     * @return void
     */
    public function updated(EuroWalletTransaction $walletTransaction)
    {
        //
    }

    /**
     * Handle the wallet transaction "deleted" event.
     *
     * @return void
     */
    public function deleted(EuroWalletTransaction $walletTransaction)
    {
        //
    }

    /**
     * Handle the wallet transaction "restored" event.
     *
     * @return void
     */
    public function restored(EuroWalletTransaction $walletTransaction)
    {
        //
    }

    /**
     * Handle the wallet transaction "force deleted" event.
     *
     * @return void
     */
    public function forceDeleted(EuroWalletTransaction $walletTransaction)
    {
        //
    }
}
