<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\MorphMany;

/**
 * App\Models\P2PTransfer
 *
 * @property int $id
 * @property int $from_member_id
 * @property int $to_member_id
 * @property string $amount
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\CoinWalletTransaction> $coinWalletTransactions
 * @property-read int|null $coin_wallet_transactions_count
 * @property-read \App\Models\Member $fromMember
 * @property-read \App\Models\Member $toMember
 * @method static \Database\Factories\P2PTransferFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder|P2PTransfer newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|P2PTransfer newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|P2PTransfer query()
 * @method static \Illuminate\Database\Eloquent\Builder|P2PTransfer whereAmount($value)
 * @method static \Illuminate\Database\Eloquent\Builder|P2PTransfer whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|P2PTransfer whereFromMemberId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|P2PTransfer whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|P2PTransfer whereToMemberId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|P2PTransfer whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class P2PTransfer extends Model
{
    use HasFactory;

    protected $table = 'p_2_p_transfers';

    protected $guarded = ['id'];

    public function coinWalletTransactions(): MorphMany
    {
        return $this->morphMany(CoinWalletTransaction::class, 'responsible');
    }

    public function fromMember(): BelongsTo|Member
    {
        return $this->belongsTo(Member::class, 'from_member_id');
    }

    public function toMember(): BelongsTo|Member
    {
        return $this->belongsTo(Member::class, 'to_member_id');
    }
}
