<?php

namespace App\Jobs;

use App\Models\IcoDetail;
use App\Traits\CoinTrait;
use Carbon\Carbon;
use DB;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Throwable;

class CheckActiveICO implements ShouldQueue
{
    use CoinTrait;
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    private Carbon $date;

    /**
     * Create a new job instance.
     */
    public function __construct(Carbon $date)
    {
        $this->date = $date;
    }

    /**
     * Execute the job.
     *
     * @throws Throwable
     */
    public function handle(): void
    {
        Carbon::setTestNow($this->date);

        DB::transaction(function () {
            IcoDetail::where('status', '!=', IcoDetail::STATUS_EXPIRED)
                ->each(function (IcoDetail $icoDetail) {
                    if (Carbon::parse($icoDetail->end_date)->lte(Carbon::parse($this->date)->format('Y-m-d'))) {
                        $icoDetail->status = IcoDetail::STATUS_EXPIRED;
                    } elseif ($icoDetail->status == IcoDetail::STATUS_PENDING) {
                        if (Carbon::parse($icoDetail->start_date)->lte(Carbon::parse($this->date)->addDay()->format('Y-m-d')) &&
                            Carbon::parse($icoDetail->end_date)->gt(Carbon::parse($this->date)->format('Y-m-d'))
                        ) {
                            $icoDetail->status = IcoDetail::STATUS_ACTIVE;
                        }
                    }
                    $icoDetail->save();
                });
        });

        Carbon::setTestNow();
    }
}
