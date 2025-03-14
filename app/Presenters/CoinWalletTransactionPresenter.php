<?php

namespace App\Presenters;

use App\Models\CoinWalletTransaction;
use Brick\Math\Exception\MathException;
use Brick\Math\Exception\RoundingNecessaryException;
use Laracasts\Presenter\Presenter;

/**
 * Class WalletTransactionPresenter
 */
class CoinWalletTransactionPresenter extends Presenter
{
    public function type(): string
    {
        return CoinWalletTransaction::TYPES[$this->entity->type];
    }

    /**
     * @throws MathException
     * @throws RoundingNecessaryException
     */
    public function openingBalance(): string
    {
        return toHumanReadable($this->entity->opening_balance);
    }

    /**
     * @throws MathException
     * @throws RoundingNecessaryException
     */
    public function closingBalance(): string
    {
        return toHumanReadable($this->entity->closing_balance);
    }

    /**
     * @throws MathException
     * @throws RoundingNecessaryException
     */
    public function total(): string
    {
        return toHumanReadable($this->entity->total);
    }
}
