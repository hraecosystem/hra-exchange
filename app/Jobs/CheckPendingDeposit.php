<?php

namespace App\Jobs;

use App\Models\Deposit;
use DB;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Throwable;

class CheckPendingDeposit implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     */
    public function __construct()
    {
        //
    }

    /**
     * Execute the job.
     *
     * @throws Throwable
     */
    public function handle(): void
    {
        DB::transaction(function () {
            Deposit::whereNotNull('blockchain_status')
                ->where('blockchain_status', Deposit::STATUS_PENDING)
                ->where('created_at', '<', now()->addMinutes(3))
                ->lockForUpdate()
                ->each(function ($deposit) {
                    ProcessWalletDeposit::dispatch($deposit);
                });
        });
    }
}
