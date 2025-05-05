<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FormProcessor;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\BookController;
use App\Models\Employee;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Здесь вы можете зарегистрировать веб-маршруты для вашего приложения.
|
*/

// 📄 Форма для пользователя
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

// 👤 Работа с Employee через Request
Route::get('/employee/create', [EmployeeController::class, 'index'])->name('employee.create');
Route::post('/employee/store', [EmployeeController::class, 'store'])->name('employee.store');
Route::post('/employee/update/{id}', [EmployeeController::class, 'update'])->name('employee.update');

// 📚 Работа с книгами (BookController)
Route::get('/index', [BookController::class, 'index'])->name('book.index');
Route::post('/store', [BookController::class, 'store'])->name('book.store');
