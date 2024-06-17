<?php 
// Подключаемся к базе данных
$conn = mysqli_connect("localhost", "zlukzl7t_vsuet_l", "Admin2004", "zlukzl7t_vsuet_l");

// Проверяем соединение
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

