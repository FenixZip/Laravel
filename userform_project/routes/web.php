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

// Страница формы
Route::get('/userform', [FormProcessor::class, 'index']); // Роут для вывода формы (метод GET)
Route::post('/store_form', [FormProcessor::class, 'store']); // Роут для обработки формы (метод POST)

// Тестовая вставка сотрудника в базу
Route::get('/test_database', function () {
    $employee = new Employee();
    $employee->first_name = 'John';
    $employee->last_name = 'Doe';
    $employee->email = 'john.doe@example.com';
    $employee->save();

    return 'Employee created successfully!';
});

// Главная страница с динамическими данными (шаблон home)
Route::get('/', function () {
    return view('home', [
        'name' => 'Alex',
        'age' => 25,
        'position' => 'Backend Developer',
        'address' => '123 Blade Street'
    ]);
});

// Страница контактов с динамическими данными (шаблон contacts)
Route::get('/contacts', function () {
    return view('contacts', [
        'address' => '456 Contact Ave',
        'post_code' => '10101',
        'email' => '',
        'phone' => '+1 234 567 890'
    ]);
});
