<?php
session_start();

if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = [];
}

$products = [
    1 => "Ноутбук",
    2 => "Телефон",
    3 => "Навушники",
    4 => "Клавіатура",
    5 => "Миша"
];

$action = $_POST['action'] ?? '';

echo "<!DOCTYPE html>
<html lang='uk'>
<head>
    <meta charset='UTF-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
    <title>Результат корзини</title>
</head>
<body>
<h2>Результат дії:</h2>";

if ($action === 'add' && isset($_POST['product_id'])) {
    $product_id = (int)$_POST['product_id'];

    if (isset($products[$product_id])) {
        $_SESSION['cart'][] = $product_id;

        $previous_purchases = isset($_COOKIE['previous_purchases'])
            ? json_decode($_COOKIE['previous_purchases'], true)
            : [];

        if (!in_array($product_id, $previous_purchases)) {
            $previous_purchases[] = $product_id;
            setcookie('previous_purchases', json_encode($previous_purchases), time() + (86400 * 30), "/");
        }
        echo "<h3>Товар '<strong>" . $products[$product_id] . "</strong>' додано в корзину!</h3>";
    }
}

elseif ($action === 'clear') {
    $_SESSION['cart'] = [];
    echo "<h3>Корзина очищена!</h3>";
}

echo "<h3>Поточна корзина (сесія):</h3>";

if (!empty($_SESSION['cart'])) {
    echo "<ul>";
    foreach ($_SESSION['cart'] as $item_id) {
        echo "<li>" . htmlspecialchars($products[$item_id]) . "</li>";
    }
    echo "</ul>";
    echo "<p><strong>Всього товарів: " . count($_SESSION['cart']) . "</strong></p>";
} else {
    echo "<p>Корзина порожня</p>";
}

echo "<h3>Попередні покупки (Cookie):</h3>";
if (isset($_COOKIE['previous_purchases'])) {
    $previous = json_decode($_COOKIE['previous_purchases'], true);
    if (!empty($previous)) {
        echo "<ul>";
        foreach ($previous as $item_id) {
            if (isset($products[$item_id])) {
                echo "<li>" . htmlspecialchars($products[$item_id]) . "</li>";
            }
        }
        echo "</ul>";
    } else {
        echo "<p>Немає попередніх покупок</p>";
    }
} else {
    echo "<p>Немає попередніх покупок</p>";
}

echo "<br><a href='index.html'><button>Назад</button></a>
</body></html>";
?>
