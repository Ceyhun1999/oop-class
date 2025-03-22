<?php
session_start();

require_once '../../class/Service.php';
$admin = new Service;
if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    if (isset($_GET['id'])) {
        $result = $admin->delete($_GET['id']);
        $_SESSION['messageForServicePage'] = 'Сервис удален';
        header('location: ../index');
        exit;
    } else {
        $_SESSION['messageForServicePage'] = 'Сервис не найден в базе данных';
        header('location: ../index');
        exit;
    }
}
