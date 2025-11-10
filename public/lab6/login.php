<!DOCTYPE html>
<html lang="uk">
<head>
    <meta charset="UTF-8">
    <title>Вхід</title>
    <style>
        body { font-family: Arial; text-align: center; margin-top: 50px; }
        input, button { padding: 8px; margin: 5px; width: 220px; font-size: 16px; }
        button { background: #4CAF50; color: white; border: none; cursor: pointer; }
        button:hover { background: #45a049; }
    </style>
</head>
<body>
<h2>Вхід</h2>
<form method="post" action="login_handler.php">
    <label>Логін:<br>
        <input type="text" name="username" required>
    </label><br><br>
    <label>Пароль:<br>
        <input type="password" name="password" required>
    </label><br><br>
    <button type="submit">Увійти</button>
</form>
<p><a href="index.php">На головну</a></p>
</body>
</html>
