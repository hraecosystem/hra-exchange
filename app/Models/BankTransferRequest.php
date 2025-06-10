<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\BankTransferRequest
 *
 * @property int $id
 * @property int $user_id
 * @property string $bank_name
 * @property string $account_name
 * @property string $iban
 * @property string|null $swift_code
 * @property string $amount_hra
 * @property string|null $amount_fiat
 * @property string $status
 * @property string|null $admin_notes
 * @property string|null $payment_proof
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\User $user
 * @method static \Illuminate\Database\Eloquent\Builder|BankTransferRequest newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|BankTransferRequest newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|BankTransferRequest query()
 * @method static \Illuminate\Database\Eloquent\Builder|BankTransferRequest whereAccountName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BankTransferRequest whereAdminNotes($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BankTransferRequest whereAmountFiat($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BankTransferRequest whereAmountHra($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BankTransferRequest whereBankName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BankTransferRequest whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BankTransferRequest whereIban($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BankTransferRequest whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BankTransferRequest wherePaymentProof($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BankTransferRequest whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BankTransferRequest whereSwiftCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BankTransferRequest whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BankTransferRequest whereUserId($value)
 * @mixin \Eloquent
 */
class BankTransferRequest extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'user_id',
        'bank_name',
        'account_name',
        'iban',
        'swift_code',
        'amount_hra',
        'amount_fiat',
        'status',
        'admin_notes',
        'payment_proof',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'amount_hra' => 'decimal:8',
        'amount_fiat' => 'decimal:2',
    ];

    /**
     * Get the user that owns the bank transfer request.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
