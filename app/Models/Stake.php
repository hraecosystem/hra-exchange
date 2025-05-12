<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\MorphOne;

/**
 * App\Models\Stake
 *
 * @property int $id
 * @property string $amount
 * @property string $coin_price
 * @property string $euro_amount
 * @property string $bonus
 * @property string $total
 * @property string $initial_amount
 * @property string $initial_euro_amount
 * @property string $initial_bonus
 * @property string $initial_total
 * @property int $stake_by_admin
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\CoinWalletTransaction|null $coinWalletTransaction
 * @property-read \App\Models\EuroWalletTransaction|null $euroWalletTransaction
 * @property-read \App\Models\StakeBonus|null $stakeBonus
 *
 * @method static \Illuminate\Database\Eloquent\Builder|Stake newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Stake newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Stake query()
 * @method static \Illuminate\Database\Eloquent\Builder|Stake whereAmount($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Stake whereBonus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Stake whereCoinPrice($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Stake whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Stake whereEuroAmount($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Stake whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Stake whereInitialAmount($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Stake whereInitialBonus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Stake whereInitialEuroAmount($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Stake whereInitialTotal($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Stake whereStakeByAdmin($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Stake whereTotal($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Stake whereUpdatedAt($value)
 *
 * @mixin \Eloquent
 */
class Stake extends Model
{
    use HasFactory;

    const BLOCKCHAIN_STATUS_PENDING = 1;

    const BLOCKCHAIN_STATUS_COMPLETED = 2;

    const BLOCKCHAIN_STATUS_FAILED = 3;

    const BLOCKCHAIN_STATUS_ADMIN_APPROVED = 4;

    const BLOCKCHAIN_STATUSES = [
        self::BLOCKCHAIN_STATUS_PENDING => 'Pending',
        self::BLOCKCHAIN_STATUS_COMPLETED => 'Completed',
        self::BLOCKCHAIN_STATUS_FAILED => 'Failed',
        self::BLOCKCHAIN_STATUS_ADMIN_APPROVED => 'Admin Approved',
    ];

    protected $guarded = ['id'];

    public static function generateRandomOrderNo($length = 8): int
    {
        $min = intval(str_repeat('1', $length));

        do {
            $max = intval(str_repeat('9', $length));
            $orderNo = mt_rand($min, $max);
            $length++;
        } while (Stake::whereOrderNo($orderNo)->exists());

        return $orderNo;
    }

    public function euroWalletTransaction(): MorphOne
    {
        return $this->morphOne(EuroWalletTransaction::class, 'responsible');
    }

    public function coinWalletTransaction(): MorphOne
    {
        return $this->morphOne(CoinWalletTransaction::class, 'responsible');
    }

    public function stakeBonus(): HasOne
    {
        return $this->hasOne(StakeBonus::class);
    }
}
