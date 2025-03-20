<?php
session_start();

require_once '../../class/Admin.php';
$admin = new Admin;
if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    if (isset($_GET['id'])) {
        $result = $admin->delete($_GET['id']);
        $_SESSION['messageForUsersPage'] = $result;
        header('location: ../index');
        exit;
    } else {
        $_SESSION['messageForUsersPage'] = 'Пользователь не найден в базе данных';
        header('location: ../index');
        exit;
    }
}
