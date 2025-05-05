@extends('layouts.default')

@section('content')
    <h2>Добавить работника</h2>

    <form method="POST" action="{{ route('employee.store') }}">
        @csrf

        <label>Имя:</label>
        <input type="text" name="name" required><br><br>

        <label>Фамилия:</label>
        <input type="text" name="surname" required><br><br>

        <label>Должность:</label>
        <input type="text" name="position" required><br><br>

        <label>Адрес:</label>
        <input type="text" name="address" required><br><br>

        <label>Доп. данные (JSON):</label><br>
        <textarea name="extra" rows="4" cols="50" required>
{
    "department": "IT",
    "salary": "1000"
}
    </textarea><br><br>

        <button type="submit">Отправить</button>
    </form>
@endsection
