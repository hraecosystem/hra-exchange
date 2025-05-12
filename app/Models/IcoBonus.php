<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * App\Models\IcoBonus
 *
 * @property int $id
 * @property int $member_id
 * @property int $ico_purchase_id
 * @property string $percentage
 * @property string $coin_price
 * @property string $euro_amount
 * @property string $amount
 * @property string|null $comment
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Member $member
 * @method static \Illuminate\Database\Eloquent\Builder|IcoBonus newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|IcoBonus newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|IcoBonus query()
 * @method static \Illuminate\Database\Eloquent\Builder|IcoBonus whereAmount($value)
 * @method static \Illuminate\Database\Eloquent\Builder|IcoBonus whereCoinPrice($value)
 * @method static \Illuminate\Database\Eloquent\Builder|IcoBonus whereComment($value)
 * @method static \Illuminate\Database\Eloquent\Builder|IcoBonus whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|IcoBonus whereEuroAmount($value)
 * @method static \Illuminate\Database\Eloquent\Builder|IcoBonus whereIcoPurchaseId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|IcoBonus whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|IcoBonus whereMemberId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|IcoBonus wherePercentage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|IcoBonus whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class IcoBonus extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function member(): BelongsTo
    {
        return $this->belongsTo(Member::class);
    }
}
