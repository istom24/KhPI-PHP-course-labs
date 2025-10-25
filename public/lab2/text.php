<?php
$log_file = 'log.txt';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && !empty($_POST['logtext'])) {
    $logtext = $_POST['logtext'];
    file_put_contents($log_file, $logtext . PHP_EOL, FILE_APPEND);
}

echo "<h2>Вміст логу:</h2>";
if (file_exists($log_file)) {
    echo "<pre>";
    echo file_get_contents($log_file);
    echo "</pre>";
} else {
    echo "Лог-файл порожній";
}

echo "<a href='index.html'>Назад</a>";
?>
