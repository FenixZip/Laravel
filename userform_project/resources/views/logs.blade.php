@extends('layouts.default')

@section('content')
    <h2>Системные логи</h2>

    <table border="1" cellpadding="10" cellspacing="0">
        <thead>
        <tr>
            <th>ID</th>
            <th>Время</th>
            <th>Длительность (сек)</th>
            <th>IP</th>
            <th>Метод</th>
            <th>URL</th>
            <th>Входные данные</th>
        </tr>
        </thead>
        <tbody>
        @foreach ($logs as $log)
            <tr>
                <td>{{ $log->id }}</td>
                <td>{{ $log->time }}</td>
                <td>{{ $log->duration }}</td>
                <td>{{ $log->ip }}</td>
                <td>{{ $log->method }}</td>
                <td>{{ $log->url }}</td>
                <td><pre>{{ $log->input }}</pre></td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection
