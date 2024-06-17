<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = htmlspecialchars(trim($_POST['name']));
    $email = filter_var(trim($_POST['email']), FILTER_SANITIZE_EMAIL);
    $message = htmlspecialchars(trim($_POST['message']));

    if (!empty($name) && !empty($email) && !empty($message) && filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $to = "vsuetlectures@gmail.com"; // Замените на ваш email
        $subject = "Новое сообщение с контактной формы";
        $body = "Имя: $name\nEmail: $email\nСообщение:\n$message";
        $headers = 'From: vsuet_lectures@vsuetlectures.ru' . "\r\n" . 'Reply-to: vsuet_lectures@vsuetlectures.ru' . "\r\n" . 'X-Mailer: PHP/' . phpversion();

        if (mail($to, $subject, $body, $headers)) {
            header("Location: index.php");
        } else {
            echo "Ошибка при отправке сообщения.";
        }
    } else {
        echo "Пожалуйста, заполните все поля корректно.";
    }
}
