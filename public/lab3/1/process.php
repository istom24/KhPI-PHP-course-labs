<!--● Створіть форму, яка запитує ім'я користувача.-->
<!--● Після введення імені та відправлення форми збережіть-->
<!--це ім'я в cookie на 7 днів.-->
<!--● Виведіть привітання з іменем користувача на сторінку-->
<!--(якщо користувач повернеться на сторінку пізніше).-->
<!--● Додайте кнопку для видалення cookie.-->
<?php
$cookie_name = "username";

if (isset($_POST['action']) && $_POST['action'] === 'delete') {
    setcookie($cookie_name, "", time() - 3600, "/");
    echo "<h2>Cookie видалено!</h2>";
    echo "<a href='index.html'>Назад</a>";
    exit;
}

if (isset($_POST['name']) && !empty($_POST['name'])) {
    setcookie($cookie_name, $_POST['name'], time() + (86400 * 7), "/");
    echo "<h2>Ім'я збережено в cookie!</h2>";
}

if (isset($_COOKIE[$cookie_name])) {
    echo "<h2>Привіт, " . htmlspecialchars($_COOKIE[$cookie_name]) . "!</h2>";
} else {
    echo "<h2>Cookie не встановлено</h2>";
}

echo "<a href='index.html'>Назад</a>";
?>
