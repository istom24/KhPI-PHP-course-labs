<?php
require 'config.php';

$username = $_POST['username'] ?? '';
$password = $_POST['password'] ?? '';

if ($username == '' || $password == '') {
    echo "<h2>Введи все, дурик!</h2>";
    echo "<a href='login.php'>Назад</a>";
    exit;
}

$stmt = $conn->prepare("SELECT id, username, password FROM users WHERE username = ? LIMIT 1");
$stmt->execute([$username]);
$user = $stmt->fetch();

if (!$user) {
    echo "<h2>Нема такого юзера!</h2>";
    echo "<a href='login.php'>Спробуй ще</a>";
    exit;
}

$md5_password = md5($password);
if ($md5_password === $user['password']) {
    $_SESSION['user_id'] = $user['id'];
    $_SESSION['username'] = $user['username'];
    header("Location: welcome.php");
    exit;
} else {
    echo "<h2>Пароль не той!</h2>";
    echo "<a href='login.php'>Назад</a>";
    exit;
}
?>


