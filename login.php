<?php
require_once 'connection.php';

// Получаем данные из формы авторизации
$username = $_POST['username'];
$password = $_POST['password'];

// Создаем запрос на получение пользователя из базы данных
$query = "SELECT * FROM users WHERE username = '$username'";

// Выполняем запрос
$result = mysqli_query($conn, $query);

// Проверяем, есть ли пользователь в базе данных
if (mysqli_num_rows($result) > 0) {
    $user = mysqli_fetch_assoc($result);
    // Проверяем пароль
    if (password_verify($password, $user['password'])) {
        // Создаем сессию для авторизованного пользователя
        session_start();
        $_SESSION['username'] = $username;
        $_SESSION['email'] = $user['email'];
        $_SESSION['created_at'] = $user['created_at'];
        header("Location: user_page.php");
        exit;
    } else {
        echo "Invalid password";
    }
} else {
    echo "User not found";
}

// Закрываем соединение с базой данных
mysqli_close($conn);
