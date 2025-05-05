<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;

class BookController extends Controller
{
    /**
     * Отображение формы добавления книги.
     */
    public function index()
    {
        return view('form');
    }

    /**
     * Обработка формы и сохранение книги.
     */
    public function store(Request $request)
    {
        // Валидация данных формы
        $validated = $request->validate([
            'title' => 'required|string|max:255|unique:books,title',
            'author' => 'required|string|max:100',
            'genre' => 'required|string'
        ]);

        // Создание и сохранение книги
        $book = new Book($validated);
        $book->save();

        // Перенаправление обратно с сообщением об успехе
        return redirect()->route('book.index')->with('success', 'Книга успешно добавлена!');
    }
}
