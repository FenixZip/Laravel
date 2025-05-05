<!-- resources/views/layouts/default.blade.php -->

<!DOCTYPE html>
<html lang="ru">
<head>
    @include('includes.head')
</head>
<body>
@include('includes.header')

<main>
    @yield('content')
</main>

@include('includes.footer')
</body>
</html>
