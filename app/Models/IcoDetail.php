<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\IcoDetail
 *
 * @property int $id
 * @property string $name
 * @property string $start_date
 * @property string $end_date
 * @property int $days
 * @property string $supply
 * @property string $price
 * @property string $min_buy
 * @property string $total_purchase
 * @property int $status
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|IcoDetail newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|IcoDetail newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|IcoDetail query()
 * @method static \Illuminate\Database\Eloquent\Builder|IcoDetail whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|IcoDetail whereDays($value)
 * @method static \Illuminate\Database\Eloquent\Builder|IcoDetail whereEndDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|IcoDetail whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|IcoDetail whereMinBuy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|IcoDetail whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|IcoDetail wherePrice($value)
 * @method static \Illuminate\Database\Eloquent\Builder|IcoDetail whereStartDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|IcoDetail whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|IcoDetail whereSupply($value)
 * @method static \Illuminate\Database\Eloquent\Builder|IcoDetail whereTotalPurchase($value)
 * @method static \Illuminate\Database\Eloquent\Builder|IcoDetail whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class IcoDetail extends Model
{
    use HasFactory;

    protected $guarded = [];

    public const STATUS_ACTIVE = 1;

    public const STATUS_PENDING = 2;

    public const STATUS_EXPIRED = 3;
}
