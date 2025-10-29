<!--● Створіть форму, яка запитує ім'я користувача.-->
<!--● Після введення імені та відправлення форми збережіть-->
<!--це ім'я в cookie на 7 днів.-->
<!--● Виведіть привітання з іменем користувача на сторінку-->
<!--(якщо користувач повернеться на сторінку пізніше).-->
<!--● Додайте кнопку для видалення cookie.-->
<?php
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

if (isset($_COOKIE[$cookie_name])) {
    echo "Привіт, " . htmlspecialchars($_COOKIE[$cookie_name]) . "!";
}
?>
