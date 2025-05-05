<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FormProcessor;
use App\Http\Controllers\EmployeeController;
use App\Models\Employee;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Здесь вы можете зарегистрировать веб-маршруты для вашего приложения.
| Эти маршруты загружаются RouteServiceProvider и все они будут
| назначены к группе middleware "web". Создавайте с радостью!
|
*/

// 📄 Форма пользователя
Route::get('/userform', [FormProcessor::class, 'index']);
Route::post('/store_form', [FormProcessor::class, 'store']);

// 🧪 Тест добавления сотрудника в БД
Route::get('/test_database', function () {
    $employee = new Employee();
    $employee->first_name = 'John';
    $employee->last_name = 'Doe';
    $employee->email = 'john.doe@example.com';
    $employee->save();

    return 'Employee created successfully!';
});

// 🏠 Главная страница
Route::get('/', function () {
    return view('home', [
        'name' => 'Alex',
        'age' => 25,
        'position' => 'Backend Developer',
        'address' => '123 Blade Street'
    ]);
});

// 📞 Контактная страница
Route::get('/contacts', function () {
    return view('contacts', [
        'address' => '456 Contact Ave',
        'post_code' => '10101',
        'email' => '',
        'phone' => '+1 234 567 890'
    ]);
});

// 👤 Работа с сотрудниками через Request

// Отображение формы добавления сотрудника
Route::get('/employee/create', [EmployeeController::class, 'index'])->name('employee.create');

// Обработка отправки формы
Route::post('/employee/store', [EmployeeController::class, 'store'])->name('employee.store');

// Обновление по ID (принимает id из URL)
Route::post('/employee/update/{id}', [EmployeeController::class, 'update'])->name('employee.update');
