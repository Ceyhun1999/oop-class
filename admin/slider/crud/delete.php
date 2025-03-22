<?php
session_start();

require_once '../../class/Slider.php';
$admin = new Slider;
if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    if (isset($_GET['id'])) {
        $result = $admin->delete($_GET['id']);
        $_SESSION['messageForSliderPage'] = 'Слайд удален';
        header('location: ../index');
        exit;
    } else {
        $_SESSION['messageForSliderPage'] = 'Слайд не найден в базе данных';
        header('location: ../index');
        exit;
    }
}
