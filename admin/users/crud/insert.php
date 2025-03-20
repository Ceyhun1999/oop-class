<?php
session_start();
function sessionMessage($result)
{
    $_SESSION['messageForUsersPage'] = $result;
    header('location: ../index');
    exit;
}
require_once '../../class/Admin.php';


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['email'], $_POST['password']) && !empty(trim($_POST['email'])) && !empty(trim($_POST['password']))) {
        $admin = new Admin;
        $email = trim($_POST['email']);
        $password = trim($_POST['password']);
        $escapedEmail = mysqli_real_escape_string($admin->db->conn, $email);
        $escapedPassword = mysqli_real_escape_string($admin->db->conn, password_hash($password, PASSWORD_BCRYPT));
        if (!$admin->checkUser($email)) {
            $result = $admin->add($escapedEmail, $escapedPassword);
            sessionMessage($result);
        } else {
            sessionMessage('Такой пользователь уже есть');
        }
    } else {
        sessionMessage('Заполните все поля');
    }
}
