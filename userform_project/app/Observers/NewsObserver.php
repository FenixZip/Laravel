<?php

namespace App\Observers;

use App\Models\News;
use Illuminate\Support\Str;

class NewsObserver
{
    /**
     * Автоматически вызывается перед сохранением новости (создание или обновление).
     */
    public function saving(News $news): void
    {
        $news->slug = Str::slug($news->title);
    }
}
