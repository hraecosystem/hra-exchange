<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * App\Models\StakeTransfer
 *
 * @property-read \App\Models\Member|null $member
 *
 * @method static \Illuminate\Database\Eloquent\Builder|StakeTransfer newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|StakeTransfer newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|StakeTransfer query()
 *
 * @mixin \Eloquent
 */
class StakeTransfer extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function member(): BelongsTo
    {
        return $this->belongsTo(Member::class);
    }
}
