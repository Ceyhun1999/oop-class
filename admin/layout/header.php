<?php
session_start();
if (!isset($_SESSION['login']) || $_SESSION['login'] === false) {
    header('location: login');
    exit;
}
?>

<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Админ панель</title>
    <link rel="stylesheet" href="http://localhost/lesson/oopwebsite/admin/css/style.css">
</head>

<body>
    <div class="container">


        <aside class="sidebar">
            <h2>Меню</h2>
            <ul>
                <li>
                    <a> <?php
                        if (isset($_SESSION['username'])) {
                            echo $_SESSION['username'];
                        }
                        ?></a>
                </li>
                <li><a href="#">Главная</a></li>
                <li><a href="http://localhost/lesson/oopwebsite/admin/users/">Пользователи</a></li>
                <li><a href="#">Настройки</a></li>
                <li><a href="http://localhost/lesson/oopwebsite/admin/login/logout.php">Выход</a></li>
            </ul>
        </aside>
        <!-- Остальное содержимое страницы -->