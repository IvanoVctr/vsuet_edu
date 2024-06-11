<?php
$conn = mysqli_connect("localhost", "root", "", "vsuet_lectures");

if (!$conn) {
    die("Connection failed: ". mysqli_connect_error());
};

$username = $_POST['username'];
$password = $_POST['password'];
$email = $_POST['email'];

$password_hash = password_hash($password, PASSWORD_BCRYPT);

$query = "INSERT INTO users (username, password, email) VALUES (?,?,?)";
$stmt = mysqli_prepare($conn, $query);
mysqli_stmt_bind_param($stmt, "sss", $username, $password_hash, $email);
mysqli_stmt_execute($stmt);

mysqli_close($conn);
?>