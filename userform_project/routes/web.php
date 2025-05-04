<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FormProcessor;
use App\Models\Employee;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Здесь вы можете зарегистрировать веб-роуты для вашего приложения.
| Эти роуты загружаются в файл RouteServiceProvider, который является
| частью вашего приложения. Путь, который вы зададите здесь,
| будет использоваться для вызова соответствующих методов контроллеров.
|
*/

Route::get('/userform', [FormProcessor::class, 'index']); // Роут для вывода формы (метод GET)
Route::post('/store_form', [FormProcessor::class, 'store']); // Роут для обработки формы (метод POST)

// Пример маршрута для теста работы с базой данных
Route::get('/test_database', function () {
    // Создание нового сотрудника
    $employee = new Employee();
    $employee->first_name = 'John';
    $employee->last_name = 'Doe';
    $employee->email = 'john.doe@example.com';
    $employee->save();  // Сохранение сотрудника в базу данных

    return 'Employee created successfully!';  // Возврат сообщения
});

