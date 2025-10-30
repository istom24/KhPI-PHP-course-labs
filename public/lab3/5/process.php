<?php
session_start();
$timeout = 300;

if (isset($_SESSION['last_activity'])) {
    $elapsed = time() - $_SESSION['last_activity'];
    if ($elapsed > $timeout) {
        session_unset();
        session_destroy();
        session_start();

        echo "<h2>Сесія завершена через неактивність!</h2>";
        echo "<p><strong>Час бездіяльності:</strong> " . $elapsed . " секунд (більше 5 хвилин)</p>";
        echo "<a href='index.html'><button>Повернутися на головну</button></a>";
        exit;
    }
}

$_SESSION['last_activity'] = time();

if (!isset($_SESSION['page_views'])) {
    $_SESSION['page_views'] = 0;
}
$_SESSION['page_views']++;

$remaining_time = $timeout - (time() - $_SESSION['last_activity']);

echo "<h2>Інформація про сесію</h2>";

echo "<h3>Статус сесії:</h3>";
echo "<ul>";
echo "<li><strong>Кількість переглядів сторінки:</strong> " . $_SESSION['page_views'] . "</li>";
echo "<li><strong>Час останньої активності:</strong> " . date('H:i:s', $_SESSION['last_activity']) . "</li>";
echo "<li><strong>Залишилось часу:</strong> " . $remaining_time . " секунд</li>";
echo "</ul>";

echo "<h3>Дії:</h3>";
echo "<form action='process.php' method='POST'>";
echo "<button type='submit'>Оновити та продовжити сесію</button>";
echo "</form>";

echo "<p><a href='index.html'><button>Назад на головну</button></a></p>";

if ($remaining_time < 60) {
    echo "<p><strong>Увага! До завершення сесії залишилось менше 1 хвилини!</strong></p>";
}
?>


