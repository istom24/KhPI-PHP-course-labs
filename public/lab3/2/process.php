<?php
session_start();

$cookie_name = "name";

if (!empty($_POST['name'])) {
    setcookie($cookie_name, $_POST['name'], time() + 86400 * 7, "/");
    header("Location: " . $_SERVER['PHP_SELF']);
    exit;
}

if (isset($_POST['delete_cookie'])) {
    setcookie($cookie_name, "", time() - 3600, "/");
    header("Location: " . $_SERVER['PHP_SELF']);
    exit;
}

$valid_username = "test";
$valid_password = "test";

if (isset($_POST['login']) && isset($_POST['password']) && isset($_POST['send'])) {
    $username = $_POST['login'];
    $password = $_POST['password'];

    if ($username === $valid_username && $password === $valid_password) {
        $_SESSION['username'] = $username;
        header("Location: " . $_SERVER['PHP_SELF']);
        exit;
    } else {
        $error = "Неправильний логін або пароль!";
    }
}

if (isset($_POST['delete'])) {
    session_unset();
    session_destroy();
    header("Location: " . $_SERVER['PHP_SELF']);
    exit;
}
<?php if (isset($_SESSION['username'])): ?>
    <p>Привіт, <?php echo htmlspecialchars($_SESSION['username']); ?>!</p>
    <form method="post">
        <button type="submit" name="delete" class="danger">Вихід</button>
    </form>
<?php else: ?>
    <form method="post">
        <label for="login">Логін:</label>
        <input type="text" name="login" id="login" required><br>
        <label for="password">Пароль:</label>
        <input type="password" name="password" id="password" required><br>
        <button type="submit" name="send">Відправити</button>
    </form>
<?php endif; ?>

</body>
</html>
?>
