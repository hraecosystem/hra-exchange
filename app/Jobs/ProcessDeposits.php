<?php

namespace App\Jobs;

use App\Models\Deposit;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\Middleware\WithoutOverlapping;
use Illuminate\Queue\SerializesModels;

class ProcessDeposits implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     */
    public function __construct()
    {
        //
    }

    public function middleware(): array
    {
        return [new WithoutOverlapping];
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        Deposit::whereStatus(Deposit::STATUS_PENDING)
            ->inRandomOrder()
            ->eachById(function (Deposit $deposit) {
                if ($deposit->pg_type === Deposit::PG_TYPE_MOLLIE) {
                    ProcessMollieDeposit::dispatch($deposit);
                }

                if ($deposit->pg_type === Deposit::PG_TYPE_STRIPE) {
                    ProcessStripeDeposit::dispatch($deposit);
                }
            });
    }
}
