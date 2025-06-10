<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\MorphOne;

/**
 * App\Models\IcoPurchase
 *
 * @property int $id
 * @property int $member_id
 * @property int|null $ico_detail_id
 * @property int|null $deposit_id
 * @property string $coin_price
 * @property string $euro_amount
 * @property string $amount
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\CoinWalletTransaction|null $coinWalletTransaction
 * @property-read \App\Models\Deposit|null $deposit
 * @property-read \App\Models\EuroWalletTransaction|null $euroWalletTransaction
 * @property-read \App\Models\IcoBonus|null $icoBonus
 * @property-read \App\Models\Member $member
 * @method static \Illuminate\Database\Eloquent\Builder|IcoPurchase newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|IcoPurchase newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|IcoPurchase query()
 * @method static \Illuminate\Database\Eloquent\Builder|IcoPurchase whereAmount($value)
 * @method static \Illuminate\Database\Eloquent\Builder|IcoPurchase whereCoinPrice($value)
 * @method static \Illuminate\Database\Eloquent\Builder|IcoPurchase whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|IcoPurchase whereDepositId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|IcoPurchase whereEuroAmount($value)
 * @method static \Illuminate\Database\Eloquent\Builder|IcoPurchase whereIcoDetailId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|IcoPurchase whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|IcoPurchase whereMemberId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|IcoPurchase whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class IcoPurchase extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function member(): BelongsTo
    {
        return $this->belongsTo(Member::class);
    }

    public function deposit(): BelongsTo
    {
        return $this->belongsTo(Deposit::class);
    }

    public function icoBonus(): HasOne
    {
        return $this->hasOne(IcoBonus::class);
    }

    public function euroWalletTransaction(): MorphOne
    {
        return $this->morphOne(EuroWalletTransaction::class, 'responsible');
    }

    public function coinWalletTransaction(): MorphOne
    {
        return $this->morphOne(CoinWalletTransaction::class, 'responsible');
    }
}
