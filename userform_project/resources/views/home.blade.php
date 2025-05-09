{{-- resources/views/home.blade.php --}}
@extends('layouts.default')

@section('content')
    <h2>Информация о пользователе</h2>

    <p><strong>Имя:</strong> {{ $name }}</p>
    <p><strong>Возраст:</strong> {{ $age }}</p>
    <p><strong>Должность:</strong> {{ $position }}</p>
    <p><strong>Адрес:</strong> {{ $address }}</p>

    @if ($age > 18)
        <p>✅ Пользователь совершеннолетний ({{ $age }})</p>
    @else
        <p>⚠️ Пользователь слишком молод ({{ $age }})</p>
    @endif
@endsection
