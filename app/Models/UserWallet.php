<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * App\Models\UserWallet
 *
 * @property int $id
 * @property int $member_id
 * @property string $public_key
 * @property string $private_key
 * @property string $usdt_balance
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Member $member
 * @method static \Illuminate\Database\Eloquent\Builder|UserWallet newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|UserWallet newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|UserWallet query()
 * @method static \Illuminate\Database\Eloquent\Builder|UserWallet whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserWallet whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserWallet whereMemberId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserWallet wherePrivateKey($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserWallet wherePublicKey($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserWallet whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserWallet whereUsdtBalance($value)
 * @mixin \Eloquent
 */
class UserWallet extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function member(): BelongsTo|Member
    {
        return $this->belongsTo(Member::class);
    }
}
