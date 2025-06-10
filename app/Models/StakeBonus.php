<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\StakeBonus
 *
 * @property int $id
 * @property int $stake_id
 * @property string $percentage
 * @property string $coin_price
 * @property string $euro_amount
 * @property string $amount
 * @property string $initial_amount
 * @property string $initial_euro_amount
 * @property string|null $comment
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|StakeBonus newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|StakeBonus newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|StakeBonus query()
 * @method static \Illuminate\Database\Eloquent\Builder|StakeBonus whereAmount($value)
 * @method static \Illuminate\Database\Eloquent\Builder|StakeBonus whereCoinPrice($value)
 * @method static \Illuminate\Database\Eloquent\Builder|StakeBonus whereComment($value)
 * @method static \Illuminate\Database\Eloquent\Builder|StakeBonus whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|StakeBonus whereEuroAmount($value)
 * @method static \Illuminate\Database\Eloquent\Builder|StakeBonus whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|StakeBonus whereInitialAmount($value)
 * @method static \Illuminate\Database\Eloquent\Builder|StakeBonus whereInitialEuroAmount($value)
 * @method static \Illuminate\Database\Eloquent\Builder|StakeBonus wherePercentage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|StakeBonus whereStakeId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|StakeBonus whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class StakeBonus extends Model
{
    use HasFactory;

    protected $guarded = [];
}
