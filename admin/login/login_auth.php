<?php
session_start();


function sessionMessage($login, $email, $path)
{
    $_SESSION['login'] = $login;
    $_SESSION['username'] = $email;
    header("location: $path");
    exit;
}
require_once '../class/Admin.php';
$admin = new Admin;
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['email'], $_POST['password']) && !empty(trim($_POST['password']))  && !empty(trim($_POST['email']))) {
        $result = $admin->login(mysqli_real_escape_string($admin->db->conn, $_POST['email']));

        if ($result->num_rows > 0) {
            $user = $result->fetch_assoc();
            if (password_verify($_POST['password'], $user['password'])) {
                sessionMessage(true, $user['email'], '../');
            } else {
                sessionMessage(false, 'Неверный пароль', './');
            }
        } else {
            sessionMessage(false, 'Такого пользователя не существует', './');
        }
    }
}
?>