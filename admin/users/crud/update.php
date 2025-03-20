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
    if (isset($_POST['email'], $_POST['password'], $_POST['id']) && !empty(trim($_POST['email'])) && !empty(trim($_POST['id']))  && !empty(trim($_POST['password']))) {
        $admin = new Admin;
        $escapedEmail = mysqli_real_escape_string($admin->db->conn, $_POST['email']);
        $escapedId = mysqli_real_escape_string($admin->db->conn, $_POST['id']);
        $escapedPassword = mysqli_real_escape_string($admin->db->conn, password_hash($_POST['password'], PASSWORD_BCRYPT));
        $result = $admin->checkUser2($escapedEmail, $escapedId);

        if ($result) sessionMessage('По такой почте уже есть пользователь');

        $result = $admin->update($escapedEmail, $escapedPassword, $escapedId);
        if ($result)  sessionMessage('Пользователь обновлен');
        else  sessionMessage('Произошла ошибка');
    } else {
        sessionMessage('Заполните все поля');
    }
}
