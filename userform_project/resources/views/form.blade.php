<!-- resources/views/form.blade.php -->

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Форма регистрации</title>
</head>
<body>
<h1>Форма регистрации</h1>

<!-- Форма для ввода данных пользователя -->
<form action="/store_form" method="POST">
    @csrf  <!-- Защита от CSRF атак -->

    <label for="first_name">Имя:</label>
    <input type="text" name="first_name" id="first_name" required><br><br>

    <label for="last_name">Фамилия:</label>
    <input type="text" name="last_name" id="last_name" required><br><br>

    <label for="email">Email:</label>
    <input type="email" name="email" id="email" required><br><br>

    <button type="submit">Отправить</button>
</form>
</body>
</html>
