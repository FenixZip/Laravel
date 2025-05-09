<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Создание таблицы users.
     */
    public function up(): void
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name', 50);
            $table->string('surname', 50);
            $table->string('email')->unique();
            $table->timestamps();
        });
    }

    /**
     * Откат миграции — удаление таблицы users.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
