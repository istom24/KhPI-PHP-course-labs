<?php
session_start();

$valid_login = "test";
$valid_password = "test";

if (isset($_POST['action']) && $_POST['action'] === 'logout') {
    session_unset();
    session_destroy();
    echo "<h2>Ви успішно вийшли з системи</h2>";
    echo "<a href='index.html'>Назад до форми входу</a>";
    exit;
}

if (isset($_POST['login']) && isset($_POST['password'])) {
    $login = $_POST['login'];
    $password = $_POST['password'];
    
    if ($login === $valid_login && $password === $valid_password) {
        $_SESSION['username'] = $login;
        echo "<h1>Вітаємо, " . htmlspecialchars($_SESSION['username']) . "!</h1>";
        echo "<p>Ви успішно увійшли в систему.</p>";
        echo "<form method='POST'>";
        echo "<button type='submit' name='action' value='logout'>Вихід</button>";
        echo "</form>";
    } else {
        echo "<h2>Неправильний логін або пароль!</h2>";
        echo "<a href='index.html'>Спробувати ще раз</a>";
    }
    exit;
}

if (isset($_SESSION['username'])) {
    echo "<h1>Вітаємо, " . htmlspecialchars($_SESSION['username']) . "!</h1>";
    echo "<p>Ви вже авторизовані.</p>";
    echo "<form method='POST'>";
    echo "<button type='submit' name='action' value='logout'>Вихід</button>";
    echo "</form>";
} else {
    echo "<h2>Ви не авторизовані</h2>";
    echo "<a href='index.html'>Увійти</a>";
}
?>
