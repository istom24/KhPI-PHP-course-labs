<?php
require 'config.php';

// если уже залогинен - показываем привет
if (!empty($_SESSION['user_id'])) {
    echo "<h1>Привіт, " . htmlspecialchars($_SESSION['username']) . "!</h1>";
    echo "<p>Ти вже в системі!</p>";
    echo "<a href='welcome.php'>На захищену сторінку</a> | ";
    echo "<a href='logout.php'>Вийти</a>";
    exit;
}
?>
<!DOCTYPE html>
<html lang="uk">
<head>
    <meta charset="UTF-8">
    <title>Авторизація</title>
    <style>
        body { font-family: Arial; text-align: center; margin-top: 50px; }
        input, button { padding: 8px; margin: 5px; font-size: 16px; }
        button { background: #4CAF50; color: white; border: none; cursor: pointer; }
        button:hover { background: #45a049; }
        a { color: #4CAF50; text-decoration: none; }
        a:hover { text-decoration: underline; }
    </style>
</head>
<body>
<h2>Авторизація</h2>
<p><a href="register.php">Реєстрація</a> | <a href="login.php">Вхід</a></p>
</body>
</html>

