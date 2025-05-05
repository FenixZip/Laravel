<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Mail;
use App\Http\Controllers\UserController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\FormProcessor;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\BookController;
use App\Models\Employee;
use App\Models\News;
use App\Events\NewsHidden;
use App\Mail\Welcome;
use App\Models\User;
use Telegram\Bot\Laravel\Facades\Telegram;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

// 📄 Пользовательская форма
Route::get('/user/create', [UserController::class, 'create'])->name('user.create');
Route::post('/user/store', [UserController::class, 'store'])->name('user.store');

// 📄 Получение пользователей
Route::get('/users', [UsersController::class, 'index'])->middleware(['auth'])->name('users.index');
Route::get('/users/{id}', [UserController::class, 'show'])->name('user.show');

// 🧾 Прежние задания
Route::get('/userform', [FormProcessor::class, 'index']);
Route::post('/store_form', [FormProcessor::class, 'store']);
Route::get('/test_database', function () {
    $employee = new Employee();
    $employee->first_name = 'John';
    $employee->last_name = 'Doe';
    $employee->email = 'john.doe@example.com';
    $employee->save();
    return 'Employee created successfully!';
});

// Blade-примеры
Route::get('/', function () {
    return view('home', [
        'name' => 'Alex',
        'age' => 25,
        'position' => 'Backend Developer',
        'address' => '123 Blade Street'
    ]);
});
Route::get('/contacts', function () {
    return view('contacts', [
        'address' => '456 Contact Ave',
        'post_code' => '10101',
        'email' => '',
        'phone' => '+1 234 567 890'
    ]);
});

// Employee Request
Route::get('/employee/create', [EmployeeController::class, 'index'])->name('employee.create');
Route::post('/employee/store', [EmployeeController::class, 'store'])->name('employee.store');
Route::post('/employee/update/{id}', [EmployeeController::class, 'update'])->name('employee.update');

// Book form
Route::get('/index', [BookController::class, 'index'])->name('book.index');
Route::post('/store', [BookController::class, 'store'])->name('book.store');

// 🆕 Создание тестовой новости
Route::get('/news/create-test', function () {
    $news = News::create([
        'title' => 'Test News Title',
        'content' => 'This is a test news content.',
    ]);
    return 'Тестовая новость создана с ID: ' . $news->id;
});

// 🆕 Скрытие новости и вызов события
Route::get('/news/{id}/hide', function ($id) {
    $news = News::findOrFail($id);
    $news->is_hidden = true;
    $news->save();

    NewsHidden::dispatch($news);
    return 'Новость скрыта и событие вызвано.';
});

// 📬 Тестовая отправка письма
Route::get('/test-mail', function () {
    $user = User::first();
    Mail::to($user->email)->send(new Welcome($user));
    return 'Письмо отправлено на ' . $user->email;
});

// 💬 Тестовая отправка сообщения в Telegram
Route::get('/test-telegram', function () {
    Telegram::sendMessage([
        'chat_id' => env('TELEGRAM_CHANNEL_ID', ''),
        'parse_mode' => 'html',
        'text' => 'Произошло тестовое событие'
    ]);
    return response()->json(['status' => 'success']);
});

// 🌐 Аутентификация (Breeze)
require __DIR__.'/auth.php';
