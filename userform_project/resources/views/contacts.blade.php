{{-- resources/views/contacts.blade.php --}}
@extends('layouts.default')

@section('content')
    <h2>Контактная информация</h2>

    <p><strong>Адрес:</strong> {{ $address }}</p>
    <p><strong>Почтовый индекс:</strong> {{ $post_code }}</p>
    <p><strong>Телефон:</strong> {{ $phone }}</p>

    @if (!empty($email))
        <p><strong>Email:</strong> {{ $email }}</p>
    @else
        <p>📭 Адрес электронной почты не указан</p>
    @endif
@endsection
