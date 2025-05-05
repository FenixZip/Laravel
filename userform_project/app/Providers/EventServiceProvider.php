<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Event;

// Событие и слушатель
use App\Events\NewsHidden;
use App\Listeners\NewsHiddenListener;

// Модель и наблюдатель
use App\Models\News;
use App\Observers\NewsObserver;

class EventServiceProvider extends ServiceProvider
{
    /**
     * Сопоставление событий и слушателей.
     */
    protected $listen = [
        NewsHidden::class => [
            NewsHiddenListener::class,
        ],
    ];

    /**
     * Регистрация любых событий для приложения.
     */
    public function boot(): void
    {
        News::observe(NewsObserver::class);
    }

    public function shouldDiscoverEvents(): bool
    {
        return false;
    }
}
