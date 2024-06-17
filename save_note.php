<?php
session_start();

// Ensure the user is logged in
if (!isset($_SESSION['username'])) {
    header("Location: index.php");
    exit();
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $title = htmlspecialchars($_POST['title']);
    $note = htmlspecialchars($_POST['note']);
    $username = $_SESSION['username'];

    // Generate a unique filename for each note based on timestamp
    $timestamp = time();
    $filePath = __DIR__ . "/notes/$username-$timestamp.txt";

    // Save the note content to the file
    $noteContent = "<h6>Заголовок: $title</h6>$note\n<hr>";
    file_put_contents($filePath, $noteContent);

    // Redirect back to the user page after saving the note
    header("Location: user_page.php");
    exit();
} else {
    // If not a POST request, redirect to user_page.php
    header("Location: user_page.php");
    exit();
}
