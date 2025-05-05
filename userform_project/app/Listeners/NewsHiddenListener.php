<?php

namespace App\Listeners;

use App\Events\NewsHidden;
use Illuminate\Support\Facades\Log;

class NewsHiddenListener
{
    /**
     * Обработка события NewsHidden.
     *
     * @param  \App\Events\NewsHidden  $event
     * @return void
     */
    public function handle(NewsHidden $event): void
    {
        Log::info('News ' . $event->news->id . ' hidden');
    }
}
