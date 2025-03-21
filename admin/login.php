<?php
session_start();


function sessionMessage($login, $email, $path)
{
    $_SESSION['login'] = $login;
    $_SESSION['username'] = $email;
    header("location: $path");
    exit;
}
require_once 'class/Admin.php';
$admin = new Admin;
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['email'], $_POST['password']) && !empty(trim($_POST['password']))  && !empty(trim($_POST['email']))) {
        $result = $admin->login(mysqli_real_escape_string($admin->db->conn, $_POST['email']));

        if ($result->num_rows > 0) {
            $user = $result->fetch_assoc();
            if (password_verify($_POST['password'], $user['password'])) {
                sessionMessage(true, $user['email'], '../admin');
            } else {
                sessionMessage(false, 'Неверный пароль', 'login');
            }
        } else {
            sessionMessage(false, 'Такого пользователя не существует', 'login');
        }
    }
    exit();
}
?>

<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <title>Страница входа</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f2f2f2;
            margin: 0;
            padding: 0;
        }

        .login-container {
            width: 300px;
            margin: 100px auto;
            background: #fff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .login-container h2 {
            text-align: center;
            margin-bottom: 20px;
        }

        .login-container label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
        }

        .login-container input[type="email"],
        .login-container input[type="password"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 3px;
        }

        .login-container input[type="submit"] {
            width: 100%;
            padding: 10px;
            border: none;
            background-color: #4CAF50;
            color: #fff;
            font-size: 16px;
            border-radius: 3px;
            cursor: pointer;
        }

        .login-container input[type="submit"]:hover {
            background-color: #45a049;
        }
    </style>
</head>

<body>
    <div class="login-container">
        <h2>Вход</h2>
        <p style="margin: 20px 0;">
            <?php
            if (isset($_SESSION['username'])) {
                echo $_SESSION['username'];
                unset($_SESSION['username']);
            }
            ?>
        </p>
        <form action="" method="POST">
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" placeholder="Введите email" required>

            <label for="password">Пароль:</label>
            <input type="password" id="password" name="password" placeholder="Введите пароль" required>

            <input type="submit" value="Войти">
        </form>
    </div>
</body>

</html>