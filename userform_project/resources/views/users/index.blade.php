@extends('layouts.app')

@section('content')
    <div class="container">
        <h2 class="mb-4">Список пользователей</h2>

        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <table class="table table-bordered">
            <thead>
            <tr>
                <th>#</th>
                <th>Имя</th>
                <th>Email</th>
                <th>Админ</th>
            </tr>
            </thead>
            <tbody>
            @forelse($users as $user)
                <tr>
                    <td>{{ $user->id }}</td>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->is_admin ? 'Да' : 'Нет' }}</td>
                </tr>
            @empty
                <tr>
                    <td colspan="4">Нет пользователей.</td>
                </tr>
            @endforelse
            </tbody>
        </table>
    </div>
@endsection
