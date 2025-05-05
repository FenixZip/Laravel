<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Storage;

class ClearCache implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public function handle(): void
    {
        // Путь к лог-файлу
        $logPath = storage_path('logs/laravel.log');

        // Очистка содержимого
        file_put_contents($logPath, '');

        \Log::info('Лог-файл был очищен задачей ClearCache');
    }
}
