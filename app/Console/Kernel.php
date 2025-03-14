<?php

namespace App\Console;

use App\Jobs\CheckActiveICO;
use App\Jobs\ProcessDeposits;
use App\Models\Export;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    /**
     * Define the application's command schedule.
     */
    protected function schedule(Schedule $schedule): void
    {
        //        $schedule->command('inspire')->hourly();
        //        $schedule->job(new ReSyncDeposits())->everyMinute();
        //        $schedule->job(new CheckPendingDeposit)->everyMinute();
        $schedule->job(new CheckActiveICO(now()))->dailyAt('23:59');

        $schedule->job(ProcessDeposits::class)->everyFiveMinutes();

        $schedule->call(function () {
            Export::expired()->eachById(function (Export $export) {
                $export->delete();
            });
        })->daily();
    }

    /**
     * Register the commands for the application.
     */
    protected function commands(): void
    {
        $this->load(__DIR__.'/Commands');

        require base_path('routes/console.php');
    }
}
