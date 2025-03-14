<?php

namespace App\Models\Relations;

use App\Models\CoinWalletTransaction;
use App\Models\Deposit;
use App\Models\EuroWalletTransaction;
use App\Models\KYC;
use App\Models\MemberLoginLog;
use App\Models\MemberStat;
use App\Models\MemberStatusLog;
use App\Models\SupportTicket;
use App\Models\User;
use App\Models\UserWallet;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

trait MemberRelations
{
    public function user(): BelongsTo|User
    {
        return $this->belongsTo(User::class);
    }

    public function userWallet(): HasOne|UserWallet
    {
        return $this->hasOne(UserWallet::class);
    }

    public function memberStatusLog(): MemberStatusLog|HasMany
    {
        return $this->hasMany(MemberStatusLog::class);
    }

    public function kyc(): KYC|HasMany
    {
        return $this->hasMany(KYC::class);
    }

    public function walletTransactions(): HasMany|EuroWalletTransaction
    {
        return $this->hasMany(EuroWalletTransaction::class);
    }

    public function coinWalletTransactions(): HasMany|CoinWalletTransaction
    {
        return $this->hasMany(CoinWalletTransaction::class);
    }

    public function supportTicket(): HasMany|SupportTicket
    {
        return $this->hasMany(SupportTicket::class);
    }

    public function deposits(): HasMany|Deposit
    {
        return $this->hasMany(Deposit::class);
    }

    public function loginLogs(): HasMany|MemberLoginLog
    {
        return $this->hasMany(MemberLoginLog::class);
    }

    public function lastLoginLog(): HasOne|MemberLoginLog
    {
        return $this->hasOne(MemberLoginLog::class)
            ->latest();
    }

    public function stat(): HasOne|MemberStat
    {
        return $this->hasOne(MemberStat::class);
    }
}
