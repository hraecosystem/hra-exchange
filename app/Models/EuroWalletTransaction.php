<?php

namespace App\Models;

use App\Presenters\EuroWalletTransactionPresenter;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Laracasts\Presenter\PresentableTrait;

/**
 * App\Models\EuroWalletTransaction
 *
 * @property int $id
 * @property int $member_id
 * @property int $responsible_id
 * @property string $responsible_type
 * @property string $opening_balance
 * @property string $closing_balance
 * @property string $amount
 * @property string $service_charge
 * @property string $total
 * @property int $type 1: Credit, 2: Debit
 * @property string|null $comment
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Member $member
 * @property-read Model|\Eloquent $responsible
 *
 * @method static Builder|EuroWalletTransaction credit()
 * @method static Builder|EuroWalletTransaction eligibleForPayout()
 * @method static Builder|EuroWalletTransaction fromDate(string $date)
 * @method static Builder|EuroWalletTransaction maxAdminCharge($max)
 * @method static Builder|EuroWalletTransaction maxAmount($max)
 * @method static Builder|EuroWalletTransaction maxTds($max)
 * @method static Builder|EuroWalletTransaction maxTotal($max)
 * @method static Builder|EuroWalletTransaction minAdminCharge($min)
 * @method static Builder|EuroWalletTransaction minAmount($min)
 * @method static Builder|EuroWalletTransaction minTds($min)
 * @method static Builder|EuroWalletTransaction minTotal($min)
 * @method static Builder|EuroWalletTransaction newModelQuery()
 * @method static Builder|EuroWalletTransaction newQuery()
 * @method static Builder|EuroWalletTransaction query()
 * @method static Builder|EuroWalletTransaction toDate(string $date)
 * @method static Builder|EuroWalletTransaction whereAmount($value)
 * @method static Builder|EuroWalletTransaction whereClosingBalance($value)
 * @method static Builder|EuroWalletTransaction whereComment($value)
 * @method static Builder|EuroWalletTransaction whereCreatedAt($value)
 * @method static Builder|EuroWalletTransaction whereId($value)
 * @method static Builder|EuroWalletTransaction whereMemberId($value)
 * @method static Builder|EuroWalletTransaction whereOpeningBalance($value)
 * @method static Builder|EuroWalletTransaction whereResponsibleId($value)
 * @method static Builder|EuroWalletTransaction whereResponsibleType($value)
 * @method static Builder|EuroWalletTransaction whereServiceCharge($value)
 * @method static Builder|EuroWalletTransaction whereTotal($value)
 * @method static Builder|EuroWalletTransaction whereType($value)
 * @method static Builder|EuroWalletTransaction whereUpdatedAt($value)
 *
 * @mixin \Eloquent
 */
class EuroWalletTransaction extends Model
{
    use PresentableTrait;

    protected $guarded = ['id'];

    protected string $presenter = EuroWalletTransactionPresenter::class;

    const TYPE_CREDIT = 1;

    const TYPE_DEBIT = 2;

    const TYPES = [
        self::TYPE_CREDIT => 'Credit',
        self::TYPE_DEBIT => 'Debit',
    ];

    /**
     * @return MorphTo
     */
    public function responsible()
    {
        return $this->morphTo();
    }

    public function member()
    {
        return $this->belongsTo(Member::class, 'member_id', 'id');
    }

    public function scopeCredit(Builder $query): Builder
    {
        return $query->where("{$this->getTable()}.type", self::TYPE_CREDIT);
    }

    /**
     * @return Builder
     */
    public function scopeMinAmount(Builder $query, $min)
    {
        return $query->where("{$this->getTable()}.amount", '>=', $min);
    }

    /**
     * @return Builder
     */
    public function scopeMaxAmount(Builder $query, $max)
    {
        return $query->where("{$this->getTable()}.amount", '<=', $max);
    }

    /**
     * @return Builder
     */
    public function scopeMinTds(Builder $query, $min)
    {
        return $query->where("{$this->getTable()}.tds", '>=', $min);
    }

    /**
     * @return Builder
     */
    public function scopeMaxTds(Builder $query, $max)
    {
        return $query->where("{$this->getTable()}.tds", '<=', $max);
    }

    /**
     * @return Builder
     */
    public function scopeMinAdminCharge(Builder $query, $min)
    {
        return $query->where("{$this->getTable()}.admin_charge", '>=', $min);
    }

    /**
     * @return Builder
     */
    public function scopeMaxAdminCharge(Builder $query, $max)
    {
        return $query->where("{$this->getTable()}.admin_charge", '<=', $max);
    }

    /**
     * @return Builder
     */
    public function scopeMinTotal(Builder $query, $min)
    {
        return $query->where("{$this->getTable()}.total", '>=', $min);
    }

    /**
     * @return Builder
     */
    public function scopeMaxTotal(Builder $query, $max)
    {
        return $query->where("{$this->getTable()}.total", '<=', $max);
    }

    public function scopeFromDate(Builder $query, string $date): Builder
    {
        return $query->whereDate("{$this->getTable()}.created_at", '>=', $date);
    }

    public function scopeToDate(Builder $query, string $date): Builder
    {
        return $query->whereDate("{$this->getTable()}.created_at", '<=', $date);
    }

    public function scopeEligibleForPayout(Builder $query): Builder
    {
        return $query->whereNull("{$this->getTable()}.payout_member_id")
            ->where("{$this->getTable()}.responsible_type", '!=', PayoutMember::class);
    }
}
