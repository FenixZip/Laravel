@extends('layouts.default')

@section('content')
    <h2>Добавить новую книгу</h2>

    {{-- Вывод ошибок валидации --}}
    @if ($errors->any())
        <div style="background-color: #fdd; border: 1px solid #f99; padding: 10px; margin-bottom: 20px;">
            <strong>Ошибки при заполнении формы:</strong>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    {{-- Сообщение об успехе --}}
    @if (session('success'))
        <div style="background-color: #dfd; border: 1px solid #9f9; padding: 10px; margin-bottom: 20px;">
            {{ session('success') }}
        </div>
    @endif

    {{-- Форма --}}
    <form method="POST" action="{{ route('book.store') }}">
        @csrf

        <label for="title">Название книги:</label><br>
        <input type="text" id="title" name="title" value="{{ old('title') }}" required><br><br>

        <label for="author">Автор:</label><br>
        <input type="text" id="author" name="author" value="{{ old('author') }}" required><br><br>

        <label for="genre">Жанр:</label><br>
        <select id="genre" name="genre" required>
            <option value="">-- выберите жанр --</option>
            <option value="Фантастика" {{ old('genre') == 'Фантастика' ? 'selected' : '' }}>Фантастика</option>
            <option value="Детектив" {{ old('genre') == 'Детектив' ? 'selected' : '' }}>Детектив</option>
            <option value="Роман" {{ old('genre') == 'Роман' ? 'selected' : '' }}>Роман</option>
            <option value="Научная литература" {{ old('genre') == 'Научная литература' ? 'selected' : '' }}>Научная
                литература
            </option>
        </select><br><br>

        <button type="submit">Сохранить книгу</button>
    </form>
@endsection
