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
    <!-- Place the first <script> tag in your HTML's <head> -->
    <script src="https://cdn.tiny.cloud/1/b7napb7dg9lktchbi89lyz9897a1e3briddv50o4n3w32kt7/tinymce/7/tinymce.min.js" referrerpolicy="origin"></script>

    <!-- Place the following <script> and <textarea> tags your HTML's <body> -->
    <script>
        tinymce.init({
            selector: 'textarea#default-editor'
        });
    </script>

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
                <li><a href="http://localhost/lesson/oopwebsite/admin/slider/">Слайдер</a></li>
                <li><a href="http://localhost/lesson/oopwebsite/admin/blogs/">Блоги</a></li>
                <li><a href="http://localhost/lesson/oopwebsite/admin/projects/">Проекты</a></li>
                <li><a href="http://localhost/lesson/oopwebsite/admin/service/">Сервис</a></li>
                <li><a href="http://localhost/lesson/oopwebsite/admin/login/logout.php">Выход</a></li>
            </ul>
        </aside>
        <!-- Остальное содержимое страницы -->