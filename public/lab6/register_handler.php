<?php
require __DIR__ . '/config.php';

$username = trim($_POST['username'] ?? '');
$email = trim($_POST['email'] ?? '');
$password = $_POST['password'] ?? '';

if ($username === '' || $email === '' || $password === '') {
    die("<h2>Всі поля обов'язкові!</h2><a href='register.php'>Назад</a>");
}

if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    die("<h2>Невірний email!</h2><a href='register.php'>Назад</a>");
}

$stmt = $conn->prepare('SELECT id FROM users WHERE username = ? OR email = ?');
$stmt->execute([$username, $email]);
if ($stmt->fetch()) {
    die("<h2>Такий логін або email вже зайнятий!</h2><a href='register.php'>Назад</a>");
}

$hashed_password = md5($password);
$stmt = $conn->prepare('INSERT INTO users (username, email, password) VALUES (?, ?, ?)');
$stmt->execute([$username, $email, $hashed_password]);

echo "<h2>Реєстрація успішна!</h2>";
echo "<p>Тепер <a href='login.php'>увійдіть</a></p>";
?>

