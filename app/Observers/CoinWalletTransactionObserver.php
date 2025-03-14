<?php

namespace App\Observers;

use App\Models\CoinWalletTransaction;

class CoinWalletTransactionObserver
{
    /**
     * Handle the wallet transaction "created" event.
     *
     * @return void
     */
    public function created(CoinWalletTransaction $walletTransaction)
    {
        if ($walletTransaction->type == CoinWalletTransaction::TYPE_CREDIT) {
            $walletTransaction->member->increment('coin_wallet_balance', $walletTransaction->total);
        } elseif ($walletTransaction->type == CoinWalletTransaction::TYPE_DEBIT) {
            $walletTransaction->member->decrement('coin_wallet_balance', $walletTransaction->total);
        }
    }

    /**
     * Handle the wallet transaction "updated" event.
     *
     * @return void
     */
    public function updated(CoinWalletTransaction $walletTransaction)
    {
        //
    }

    /**
     * Handle the wallet transaction "deleted" event.
     *
     * @return void
     */
    public function deleted(CoinWalletTransaction $walletTransaction)
    {
        //
    }

    /**
     * Handle the wallet transaction "restored" event.
     *
     * @return void
     */
    public function restored(CoinWalletTransaction $walletTransaction)
    {
        //
    }

    /**
     * Handle the wallet transaction "force deleted" event.
     *
     * @return void
     */
    public function forceDeleted(CoinWalletTransaction $walletTransaction)
    {
        //
    }
}
