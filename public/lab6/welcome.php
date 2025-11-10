<?php
require 'config.php';

if (empty($_SESSION['user_id'])) {
    header("Location: login.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="uk">
<head>
    <meta charset="UTF-8">
    <title>Welcome</title>
    <style>
        body { font-family: Arial; text-align: center; margin-top: 50px; }
        button { padding: 8px 16px; background: #f44336; color: white; border: none; cursor: pointer; }
        button:hover { background: #d32f2f; }
    </style>
</head>
<body>
<h2>Вітаю, <?=htmlspecialchars($_SESSION['username'])?>!</h2>
<p>Ти на захищеній сторінці!</p>
<form method="POST" action="logout.php">
    <button type="submit">Вийти</button>
</form>
<p><a href="index.php">На головну</a></p>
</body>
</html>
