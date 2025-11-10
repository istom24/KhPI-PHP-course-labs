<?php require __DIR__ . '/config.php'; ?>
<!DOCTYPE html>
<html lang="uk">
<head>
    <meta charset="UTF-8">
    <title>Реєстрація</title>
    <style>
        body{font-family:Arial;text-align:center;margin-top:50px;}
        input,button{padding:8px;margin:5px;width:220px;font-size:16px;}
        button{background:#4CAF50;color:white;border:none;cursor:pointer;}
        button:hover{background:#45a049;}
        a{color:#4CAF50;}
    </style>
</head>
<body>
<h2>Реєстрація</h2>
<form method="post" action="register_handler.php">
    <input type="text" name="username" placeholder="Логін" required><br><br>
    <input type="email" name="email" placeholder="Email" required><br><br>
    <input type="password" name="password" placeholder="Пароль" required><br><br>
    <button type="submit">Зареєструватися</button>
</form>
<p><a href="index.php">На головну</a></p>
</body>
</html>
