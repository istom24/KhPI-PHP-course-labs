<?php
if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    echo "<h2>Інформація з масиву \$_SERVER</h2>";
    echo "<ul>";
    echo "<h3>Основна інформація про запит:</h3>";
    echo "<ul>";
    echo "<li><strong>IP-адреса клієнта:</strong> " . $_SERVER['REMOTE_ADDR'] . "</li>";
    echo "<li><strong>Браузер:</strong> " . $_SERVER['HTTP_USER_AGENT'] . "</li>";
    echo "<li><strong>Метод запиту:</strong> " . $_SERVER['REQUEST_METHOD'] . "</li>";
    echo "<li><strong>Назва скрипта:</strong> " . $_SERVER['PHP_SELF'] . "</li>";
    echo "<li><strong>Файл на сервері:</strong> " . $_SERVER['SCRIPT_FILENAME'] . "</li>";
    echo "</ul>";
    echo "<br><a href='index.html'>Назад</a>";
    exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    echo "<h2>Інформація з масиву \$_SERVER</h2>";

    echo "<h3>Основна інформація про запит:</h3>";
    echo "<ul>";
    echo "<li><strong>IP-адреса клієнта:</strong> " . $_SERVER['REMOTE_ADDR'] . "</li>";
    echo "<li><strong>Браузер:</strong> " . $_SERVER['HTTP_USER_AGENT'] . "</li>";
    echo "<li><strong>Метод запиту:</strong> " . $_SERVER['REQUEST_METHOD'] . "</li>";
    echo "<li><strong>Назва скрипта:</strong> " . $_SERVER['PHP_SELF'] . "</li>";
    echo "<li><strong>Файл на сервері:</strong> " . $_SERVER['SCRIPT_FILENAME'] . "</li>";
    echo "</ul>";

    echo "<h3>Дані форми:</h3>";
    if (isset($_POST['test'])) {
        echo "<p><strong>Ви відправили:</strong> " . htmlspecialchars($_POST['test']) . "</p>";
    }

    echo "<br><a href='index.html'>Назад</a>";
}
?>
