<?php

namespace App\Console;

use App\Jobs\HeartBeat;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    /**
     * The Artisan commands provided by your application.
     *
     * @var array
     */
    protected $commands = [
        //
    ];

    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
        // $schedule->command('inspire')
        //          ->hourly();
        // $schedule->job(new HeartBeat())->everyMinute();
        // $schedule->call(function(){
            // file_put_contents("test_task.txt","\r\n " . date("Y-m-d H:i:s") . "这里是task",FILE_APPEND);
        // })->everyMinute();
        // $schedule->call(function(){
            // file_put_contents("test_task.txt","\r\n " . date("Y-m-d H:i:s") . "这里是task2",FILE_APPEND);
        // })->everyMinute();
        // $schedule->command('App\Console\Commands\TestCommand')->everyMinute()->withoutOverlapping()->runInBackground();
        // $schedule->command('Test')->everyMinute()->withoutOverlapping()->runInBackground();
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
