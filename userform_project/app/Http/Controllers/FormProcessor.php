<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FormProcessor extends Controller
{
    /**
     * Метод для вывода формы.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        return view('form'); // Возвращаем представление с формой
    }

    /**
     * Метод для обработки отправленной формы.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\View\View|\Illuminate\Http\JsonResponse
     */
    public function store(Request $request)
    {
        // Валидация данных формы (по желанию)
        $validated = $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
        ]);

        // Получаем данные из формы
        $data = $request->only(['first_name', 'last_name', 'email']);

        // Выводим данные в виде JSON (можно раскомментировать, если нужен JSON-ответ)
        // return response()->json($data);

        // Возвращаем представление с приветствием
        return view('greeting', ['first_name' => $data['first_name']]);
    }
}
