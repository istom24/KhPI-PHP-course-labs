<?php
$cacheDir = 'cache';
$cacheFile = $cacheDir . '/report.html';
$cacheTime = 600;
$delay = 3;

if (!is_dir($cacheDir)) {
    mkdir($cacheDir, 0755, true);
}

if (file_exists($cacheFile) && (time() - filemtime($cacheFile)) < $cacheTime) {
    readfile($cacheFile);
    echo "<p>Джерело: кеш-файл</p>";
} else {
    sleep($delay);

    ob_start();
    echo "<h3>HTML-звіт</h3>";
    echo "<p>Згенеровано: " . date('H:i:s') . "</p>";
    echo "<table border='1' cellspacing='0' cellpadding='4'>";
    echo "<tr><th>#</th><th>Ім’я</th><th>Сума</th></tr>";
    for ($i = 1; $i <= 1000; $i++) {
        echo "<tr><td>$i</td><td>Користувач $i</td><td>" . rand(100, 9999) . " UAH</td></tr>";
    }
    echo "</table>";
    $content = ob_get_clean();

    file_put_contents($cacheFile, $content);

    echo $content;
    echo "<p>Джерело: нова генерація (затримка {$delay} сек)</p>";
}
?>
