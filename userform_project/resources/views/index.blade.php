@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Список пользователей</h1>
        <ul>
            @foreach($users as $user)
                <li>{{ $user->name }} – {{ $user->email }}</li>
            @endforeach
        </ul>
    </div>
@endsection
