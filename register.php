<?php
// Подключаемся к базе данных
$conn = mysqli_connect("localhost", "root", "", "database");

// Проверяем соединение
if (!$conn) {
    die("Connection failed: ". mysqli_connect_error());
}

// Получаем данные из формы регистрации
$username = $_POST['username'];
$password = $_POST['password'];
$email = $_POST['email'];

// Хешируем пароль
$password_hash = password_hash($password, PASSWORD_BCRYPT);

// Создаем запрос на добавление пользователя в базу данных
$query = "INSERT INTO users (username, password, email) VALUES ('$username', '$password_hash', '$email')";

// Выполняем запрос
if (mysqli_query($conn, $query)) {
    // Создаем сессию для нового пользователя
    session_start();
    $_SESSION['username'] = $username;
    $_SESSION['email'] = $email;
    header("Location: /user_page.php");
    exit;
} else {
    echo "Error: ". mysqli_error($conn);
}

// Закрываем соединение с базой данных
mysqli_close($conn);
