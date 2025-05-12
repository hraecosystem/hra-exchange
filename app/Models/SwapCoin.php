<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\MorphOne;

/**
 * App\Models\SwapCoin
 *
 * @property int $id
 * @property int $member_id
 * @property string $amount
 * @property string $coin_price
 * @property string $euro_amount
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\CoinWalletTransaction|null $coinWalletTransactions
 * @property-read \App\Models\Member $member
 * @property-read \App\Models\EuroWalletTransaction|null $walletTransactions
 * @method static \Illuminate\Database\Eloquent\Builder|SwapCoin newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|SwapCoin newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|SwapCoin query()
 * @method static \Illuminate\Database\Eloquent\Builder|SwapCoin whereAmount($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SwapCoin whereCoinPrice($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SwapCoin whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SwapCoin whereEuroAmount($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SwapCoin whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SwapCoin whereMemberId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SwapCoin whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class SwapCoin extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function member(): BelongsTo|Member
    {
        return $this->belongsTo(Member::class);
    }

    public function walletTransactions(): MorphOne|EuroWalletTransaction
    {
        return $this->morphOne(EuroWalletTransaction::class, 'responsible');
    }

    public function coinWalletTransactions(): MorphOne|CoinWalletTransaction
    {
        return $this->morphOne(CoinWalletTransaction::class, 'responsible');
    }
}
