<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\MorphOne;

/**
 * App\Models\Deposit
 *
 * @property int $id
 * @property int $member_id
 * @property int|null $ico_detail_id
 * @property int $order_no
 * @property string|null $pg_id
 * @property int|null $pg_type 1: Mollie, 2: Stripe
 * @property string $coin_price
 * @property string $euro_amount
 * @property string $amount
 * @property int $status 1: Pending, 2: Completed, 3: Failed, 4: Cancelled
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\CoinWalletTransaction|null $avsWalletTransaction
 * @property-read \App\Models\EuroWalletTransaction|null $euroWalletTransaction
 * @property-read \App\Models\IcoPurchase|null $icoPurchase
 * @property-read \App\Models\Member $member
 * @method static \Illuminate\Database\Eloquent\Builder|Deposit newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Deposit newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Deposit query()
 * @method static \Illuminate\Database\Eloquent\Builder|Deposit whereAmount($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Deposit whereCoinPrice($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Deposit whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Deposit whereEuroAmount($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Deposit whereIcoDetailId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Deposit whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Deposit whereMemberId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Deposit whereOrderNo($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Deposit wherePgId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Deposit wherePgType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Deposit whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Deposit whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Deposit extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    protected $casts = ['receipt' => 'json'];

    const int PG_TYPE_MOLLIE = 1;

    const int PG_TYPE_STRIPE = 2;

    const int STATUS_PENDING = 1;

    const int STATUS_COMPLETED = 2;

    const int STATUS_FAILED = 3;

    const int STATUS_CANCELLED = 4;

    const int STATUS_EXPIRED = 5;

    const array STATUSES = [
        self::STATUS_PENDING => 'Pending',
        self::STATUS_COMPLETED => 'Completed',
        self::STATUS_FAILED => 'Failed',
        self::STATUS_CANCELLED => 'Cancelled',
        self::STATUS_EXPIRED => 'Expired',
    ];

    public static function generateRandomOrderNo($length = 8): int
    {
        $min = intval(str_repeat('1', $length));

        do {
            $max = intval(str_repeat('9', $length));
            $orderNo = mt_rand($min, $max);
            $length++;
        } while (Deposit::whereOrderNo($orderNo)->exists());

        return $orderNo;
    }

    public function icoPurchase(): HasOne|IcoPurchase
    {
        return $this->hasOne(IcoPurchase::class);
    }

    public function euroWalletTransaction(): MorphOne
    {
        return $this->morphOne(EuroWalletTransaction::class, 'responsible');
    }

    public function avsWalletTransaction(): MorphOne
    {
        return $this->morphOne(CoinWalletTransaction::class, 'responsible');
    }

    public function member(): BelongsTo
    {
        return $this->belongsTo(Member::class);
    }
}
