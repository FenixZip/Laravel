@extends('layouts.default')

@section('content')
    <h2>Добавить пользователя</h2>

    {{-- Уведомление об успешном сохранении --}}
    @if (session('success'))
        <div style="background-color: #d4edda; color: #155724; padding: 10px; border-radius: 5px;">
            {{ session('success') }}
        </div>
    @endif

    {{-- Ошибки валидации --}}
    @if ($errors->any())
        <div style="background-color: #f8d7da; color: #721c24; padding: 10px; border-radius: 5px;">
            <strong>Пожалуйста, исправьте ошибки:</strong>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form method="POST" action="{{ route('user.store') }}">
        @csrf

        <label for="name">Имя:</label><br>
        <input type="text" name="name" id="name" value="{{ old('name') }}" required maxlength="50"><br><br>

        <label for="surname">Фамилия:</label><br>
        <input type="text" name="surname" id="surname" value="{{ old('surname') }}" required maxlength="50"><br><br>

        <label for="email">Email:</label><br>
        <input type="email" name="email" id="email" value="{{ old('email') }}" required
               pattern="^[\w\.-]+@[\w\.-]+\.\w{2,4}$"><br><br>

        <label for="password">Пароль:</label><br>
        <input type="password" name="password" id="password" required minlength="6"><br><br>

        <button type="submit">Сохранить</button>
    </form>
@endsection
