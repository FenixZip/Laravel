<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;
use App\Jobs\ClearCache;

class Kernel extends ConsoleKernel
{
    /**
     * Определение команд Artisan для приложения.
     */
    protected function commands()
    {
        $this->load(__DIR__.'/Commands');

        require base_path('routes/console.php');
    }

    /**
     * Определение планировщика задач.
     */
    protected function schedule(Schedule $schedule)
    {
        // Очистка логов каждый час
        $schedule->job(new ClearCache)->hourly();
    }
}
