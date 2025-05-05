<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Models\Log;
use Carbon\Carbon;

class DataLogger
{
    public function handle(Request $request, Closure $next)
    {
        // Засекаем время начала
        $start = microtime(true);

        // Обрабатываем запрос
        $response = $next($request);

        // Засекаем окончание
        $end = microtime(true);
        $duration = round($end - $start, 5);

        // Сохраняем лог в базу данных
        Log::create([
            'time' => Carbon::now(),
            'duration' => $duration,
            'ip' => $request->ip(),
            'url' => $request->fullUrl(),
            'method' => $request->method(),
            'input' => json_encode($request->except(['_token'])),
        ]);

        return $response;
    }
}
