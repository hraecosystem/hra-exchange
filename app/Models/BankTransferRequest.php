<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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
