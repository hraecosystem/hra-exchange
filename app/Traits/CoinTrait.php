<?php

namespace App\Traits;

use App\Models\IcoDetail;

trait CoinTrait
{
    public function calculateCoinsPrice(): ?float
    {
        $activeICO = IcoDetail::where('status', IcoDetail::STATUS_ACTIVE)->first();

        if ($activeICO) {
            $coinPrice = $activeICO->price;
        } else {
            $coinPrice = settings('coin_price');
        }

        $price = $coinPrice;

        return $price ?: null;
    }

    public function calculateCoins($amount): float|int
    {
        return round($amount / $this->calculateCoinsPrice(), 8);
    }

    public function calculateCoinsDollar($amount): float|int
    {
        return round($amount * $this->calculateCoinsPrice(), 8);
    }

    public function calculateEuroCoins($amount): ?float
    {
        $price = $this->calculateCoinsPrice();

        return $price ? $amount / $price : null;
    }
}
