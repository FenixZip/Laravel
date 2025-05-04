<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmployeesTable extends Migration
{
    /**
     * Запуск миграции для создания таблицы employees.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employees', function (Blueprint $table) {
            $table->id();  // Создание поля id (автоматический инкремент)
            $table->string('first_name');  // Строка для имени
            $table->string('last_name');   // Строка для фамилии
            $table->string('email')->unique();  // Уникальный email
            $table->timestamps();  // Столбцы для времени создания и обновления записи
        });
    }

    /**
     * Отмена миграции (удаление таблицы employees).
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('employees');
    }
}
