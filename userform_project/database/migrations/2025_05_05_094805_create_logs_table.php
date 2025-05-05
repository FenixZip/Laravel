<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Создание таблицы логов.
     */
    public function up(): void
    {
        Schema::create('logs', function (Blueprint $table) {
            $table->id();
            $table->timestamp('time');              // Время события
            $table->float('duration');              // Длительность запроса
            $table->string('ip', 45);               // IP-адрес пользователя
            $table->string('url');                  // Запрошенный URL
            $table->string('method');               // HTTP-метод (GET, POST и т.д.)
            $table->text('input')->nullable();      // Входящие данные (JSON)
        });
    }

    /**
     * Откат миграции.
     */
    public function down(): void
    {
        Schema::dropIfExists('logs');
    }
};
