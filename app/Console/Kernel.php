<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

use App\Console\Commands\LoginOperTask;

class Kernel extends ConsoleKernel
{
    /**
     * The Artisan commands provided by your application.
     *
     * @var array
     */
    protected $commands = [
        LoginOperTask::class
    ];

    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
        /*
         |--------------------------------------------------------------------------
         | CRON JOB OPERTASK
         |--------------------------------------------------------------------------
         |
         | This part is used for OperTask's integration.
         | Please only put OperTask's cron-job related 
         | in this row.
         | 
         | @since February 25, 2021
         |
         */

        /**
         * Login Opertask to get their token.
         * It's run at 00:00 everyday.
         */
        $schedule->command('opertask:login')
            ->cron('* * 0/4 * *');

        /*
         |--------------------------------------------------------------------------
         | CRON JOB 
         |--------------------------------------------------------------------------
         |
         | This part is used for internal purpose.
         | Please only put internal's cron-job related 
         | in this row.
         | 
         | @since February 25, 2021
         |
         */
    }

    /**
     * Register the commands for the application.
     *
     * @return void
     */
    protected function commands()
    {
        $this->load(__DIR__.'/Commands');

        require base_path('routes/console.php');
    }
}
