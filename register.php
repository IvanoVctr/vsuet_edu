<?php
require_once 'connection.php';

// Получаем данные из формы регистрации
$username = $_POST['username'];
$password = $_POST['password'];
$email = $_POST['email'];

// Хешируем пароль
$password_hash = password_hash($password, PASSWORD_BCRYPT);

// Создаем запрос на добавление пользователя в базу данных
$query = "INSERT INTO users (username, password, email) VALUES ('$username', '$password_hash', '$email')";
$query2 = "SELECT created_at FROM users WHERE email = '$email'";



// Выполняем запрос
if (mysqli_query($conn, $query)) {
    // Создаем сессию для нового пользователя
    session_start();
    $result = mysqli_query($conn, $query2);
    $row = mysqli_fetch_assoc($result);
    $_SESSION['username'] = $username;
    $_SESSION['email'] = $email;
    $_SESSION['created_at'] = $row['created_at'];
    header("Location: user_page.php");

    exit;
} else {
    echo "Error: ". mysqli_error($conn);
}

// Закрываем соединение с базой данных
mysqli_close($conn);
