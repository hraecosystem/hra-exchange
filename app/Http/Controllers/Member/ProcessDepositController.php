<?php

namespace App\Http\Controllers\Member;

use App\Http\Controllers\Controller;
use App\Jobs\ProcessMollieDeposit;
use App\Jobs\ProcessStripeDeposit;
use App\Models\Deposit;
use Illuminate\Http\RedirectResponse;

class ProcessDepositController extends Controller
{
    public function store($orderNo): RedirectResponse
    {
        $deposit = $this->member->deposits()->whereOrderNo($orderNo)->firstOrFail();

        if ($deposit->pg_type === Deposit::PG_TYPE_MOLLIE) {
            ProcessMollieDeposit::dispatch($deposit);
        } elseif ($deposit->pg_type === Deposit::PG_TYPE_STRIPE) {
            ProcessStripeDeposit::dispatch($deposit);
        }

        return redirect()
            ->route('member.deposit.index')
            ->with([
                'success' => 'Your payment will be verified and processed shortly.',
            ]);
    }
}
