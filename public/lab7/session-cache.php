<?php
session_start();

$cacheKey = 'currency_data';
$cacheDuration = 600; // 10 хвилин

function generateRates() {
    sleep(2); // Імітація затримки обчислень
    return [
            'usd' => rand(35, 40) . '.' . rand(10, 99),
            'eur' => rand(38, 43) . '.' . rand(10, 99),
            'generated_at' => date('H:i:s')
    ];
}

if (isset($_SESSION[$cacheKey]) && isset($_SESSION[$cacheKey . '_time'])) {
    $age = time() - $_SESSION[$cacheKey . '_time'];
    if ($age < $cacheDuration) {
        $data = $_SESSION[$cacheKey];
        $source = 'з кешу сесії (миттєво)';
    } else {
        $data = generateRates();
        $_SESSION[$cacheKey] = $data;
        $_SESSION[$cacheKey . '_time'] = time();
        $source = 'оновлено кеш (затримка 2 сек)';
    }
} else {
    $data = generateRates();
    $_SESSION[$cacheKey] = $data;
    $_SESSION[$cacheKey . '_time'] = time();
    $source = 'створено новий кеш (затримка 2 сек)';
}
?>
<!DOCTYPE html>
<html lang="uk">
<head>
    <meta charset="UTF-8">
    <title>Кешування через PHP-сесію</title>
</head>
<body>
<h3>Курс валют (сесійний кеш)</h3>
<p>ID сесії: <?= session_id() ?></p>
<ul>
    <li>USD: <?= $data['usd'] ?> UAH</li>
    <li>EUR: <?= $data['eur'] ?> UAH</li>
</ul>
<p>Час оновлення: <?= $data['generated_at'] ?></p>
<hr>
<p><strong>Джерело:</strong> <?= $source ?></p>
</body>
</html>
