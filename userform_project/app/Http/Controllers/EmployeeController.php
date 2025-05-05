<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    // Метод для отображения формы
    public function index()
    {
        return view('employee_form');
    }

    // Метод для обработки POST-запроса из формы
    public function store(Request $request)
    {
        // Получение стандартных полей
        $name = $request->input('name');
        $surname = $request->input('surname');
        $position = $request->input('position');
        $address = $request->input('address');

        // Получение служебной информации
        $path = $request->path();
        $url = $request->url();

        // Обработка JSON-поля
        $extraJson = $request->input('extra');
        $extra = json_decode($extraJson, true);

        $department = $extra['department'] ?? 'Не указано';
        $salary = $extra['salary'] ?? 'Не указано';

        // Возвращаем результат в виде JSON
        return response()->json([
            'name' => $name,
            'surname' => $surname,
            'position' => $position,
            'address' => $address,
            'department' => $department,
            'salary' => $salary,
            'request_path' => $path,
            'request_url' => $url
        ]);
    }

    // Метод для обновления (например, при передаче id)
    public function update(Request $request, $id)
    {
        $name = $request->input('name');
        $email = $request->input('email');

        // Служебные данные
        $path = $request->path();
        $url = $request->url();

        // Обработка JSON
        $extraJson = $request->input('extra');
        $extra = json_decode($extraJson, true);

        $department = $extra['department'] ?? 'Не указано';
        $salary = $extra['salary'] ?? 'Не указано';

        return response()->json([
            'id' => $id,
            'name' => $name,
            'email' => $email,
            'department' => $department,
            'salary' => $salary,
            'request_path' => $path,
            'request_url' => $url
        ]);
    }
}
