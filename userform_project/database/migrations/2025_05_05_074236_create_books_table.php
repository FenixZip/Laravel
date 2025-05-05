<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Создание таблицы books.
     */
    public function up(): void
    {
        Schema::create('books', function (Blueprint $table) {
            $table->id();
            $table->string('title', 255)->unique();
            $table->string('author', 100);
            $table->string('genre');
            $table->timestamps();
        });
    }

    /**
     * Откат миграции (удаление таблицы books).
     */
    public function down(): void
    {
        Schema::dropIfExists('books');
    }
};
