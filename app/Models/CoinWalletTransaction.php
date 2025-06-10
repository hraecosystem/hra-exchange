<?php

namespace App\Models;

use App\Presenters\CoinWalletTransactionPresenter;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\MorphTo;
use Laracasts\Presenter\PresentableTrait;

/**
 * App\Models\CoinWalletTransaction
 *
 * @property int $id
 * @property int $member_id
 * @property int $responsible_id
 * @property string $responsible_type
 * @property string $opening_balance
 * @property string $closing_balance
 * @property string $amount
 * @property string $euro_amount
 * @property string $service_charge
 * @property string $total
 * @property int $type 1: Credit, 2: Debit
 * @property string|null $comment
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Member $member
 * @property-read Model|\Eloquent $responsible
 *
 * @method static Builder|CoinWalletTransaction credit()
 * @method static Builder|CoinWalletTransaction newModelQuery()
 * @method static Builder|CoinWalletTransaction newQuery()
 * @method static Builder|CoinWalletTransaction query()
 * @method static Builder|CoinWalletTransaction whereAmount($value)
 * @method static Builder|CoinWalletTransaction whereClosingBalance($value)
 * @method static Builder|CoinWalletTransaction whereComment($value)
 * @method static Builder|CoinWalletTransaction whereCreatedAt($value)
 * @method static Builder|CoinWalletTransaction whereEuroAmount($value)
 * @method static Builder|CoinWalletTransaction whereId($value)
 * @method static Builder|CoinWalletTransaction whereMemberId($value)
 * @method static Builder|CoinWalletTransaction whereOpeningBalance($value)
 * @method static Builder|CoinWalletTransaction whereResponsibleId($value)
 * @method static Builder|CoinWalletTransaction whereResponsibleType($value)
 * @method static Builder|CoinWalletTransaction whereServiceCharge($value)
 * @method static Builder|CoinWalletTransaction whereTotal($value)
 * @method static Builder|CoinWalletTransaction whereType($value)
 * @method static Builder|CoinWalletTransaction whereUpdatedAt($value)
 *
 * @mixin \Eloquent
 */
class CoinWalletTransaction extends Model
{
    use HasFactory;
    use PresentableTrait;

    protected $guarded = ['id'];

    protected string $presenter = CoinWalletTransactionPresenter::class;

    const TYPE_CREDIT = 1;

    const TYPE_DEBIT = 2;

    const TYPES = [
        self::TYPE_CREDIT => 'Credit',
        self::TYPE_DEBIT => 'Debit',
    ];

    public function responsible(): MorphTo
    {
        return $this->morphTo();
    }

    public function member(): BelongsTo
    {
        return $this->belongsTo(Member::class, 'member_id', 'id');
    }

    public function scopeCredit(Builder $query): Builder
    {
        return $query->where("{$this->getTable()}.type", self::TYPE_CREDIT);
    }
}
