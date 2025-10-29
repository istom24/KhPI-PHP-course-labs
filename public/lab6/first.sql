-- <!--1. Підготовка бази даних::-->
-- <!--● Створіть базу даних users_db.-->
-- <!--● У базі даних створіть таблицю users, яка містить-->
-- <!--наступні поля:-->
-- <!--■ id (INT, AUTO_INCREMENT, PRIMARY KEY)-->
-- <!--■ username (VARCHAR(50), Унікальний)-->
-- <!--■ email (VARCHAR(100), Унікальний)-->
-- <!--■ password (VARCHAR(255)) – зберігати-->
-- <!--хешований пароль-->
-- <?php

DROP TABLE IF EXISTS users;
CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) UNIQUE NOT NULL,
    email VARCHAR(100) UNIQUE NOT NULL,
    password VARCHAR(255) NOT NULL
);

