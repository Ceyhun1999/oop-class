<?php
session_start();
function sessionMessage($message) {
    $_SESSION['messageForServicePage'] = $message;
    header('Location: ../');
    exit;
}
require_once '../../class/Service.php';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['title'], $_POST['description'], $_POST['id']) && !empty($_POST['title']) && !empty($_POST['id']) && !empty($_POST['description'])) {
        $title = $_POST['title'];
        $id = $_POST['id'];
        $description =  $_POST['description'];

        if (!isset($_FILES['image'])) {
            sessionMessage("Файл не был загружен.");
        } elseif ($_FILES['image']['error'] !== UPLOAD_ERR_OK) {
            sessionMessage("Ошибка при загрузке файла. Код ошибки: " . $_FILES['image']['error']);
        } else {

            $uploadDir = '../../uploads/'; // Папка для сохранения файлов

            // Создаем папку, если она не существует
            if (!is_dir($uploadDir)) {
                mkdir($uploadDir, 0755, true);
            }

            // Получаем расширение файла
            $extension = pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION);
            // Формируем уникальное имя файла, добавляя uniqid() и оригинальное расширение
            $uniqueName = uniqid('', true) . '.' . $extension;
            $targetFile = $uploadDir . $uniqueName;

            // Перемещаем загруженный файл из временной директории в папку upload
            if (move_uploaded_file($_FILES['image']['tmp_name'], $targetFile)) {
                $service = new Service;
                $escapedTitle = mysqli_real_escape_string($service->db->conn, $title);
                $escapedId= mysqli_real_escape_string($service->db->conn, $id);
                $escapedDescription = mysqli_real_escape_string($service->db->conn, $description);
                $escapedImage = mysqli_real_escape_string($service->db->conn, $uniqueName);

                if ($service->update($escapedId,$escapedTitle, $escapedDescription, $escapedImage)) {
                    sessionMessage('Сервис обновлен');
                } else {
                    sessionMessage('Ошибка');
                }
            } else {
                sessionMessage("Ошибка при перемещении файла.");
            }
        }
    } else {
        echo 'Заполните все поля';
    }
}
