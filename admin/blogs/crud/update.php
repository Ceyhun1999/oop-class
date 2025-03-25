<?php
session_start();
require_once '../../class/Blog.php';
function sessionMessage($text)
{
    $_SESSION['messageForBlogPage'] = $text;
    header('Location: ../');
    exit;
}

if ($_SERVER['REQUEST_METHOD']  === 'POST') {
    if (isset($_POST['title'], $_POST['description'],  $_POST['id']) && !empty(trim($_POST['title']))  && !empty(trim($_POST['id'])) && !empty(trim($_POST['description']))) {
        $title = $_POST['title'];
        $description = $_POST['description'];
        $id = $_POST['id'];

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
                $service = new Blog;
                $escapedTitle = mysqli_real_escape_string($service->db->conn, $title);
                $escapedDescription = mysqli_real_escape_string($service->db->conn, $description);
                $escapedId = mysqli_real_escape_string($service->db->conn, $id);
                $escapedImage = mysqli_real_escape_string($service->db->conn, $uniqueName);

                if ($service->update($escapedId, $escapedTitle, $escapedDescription, $escapedImage)) {
                    sessionMessage('Блог обновлен');
                } else {
                    sessionMessage('Ошибка');
                }
            } else {
                sessionMessage("Ошибка при перемещении файла.");
            }
        }
    } else {
        sessionMessage('Заполните все поля');
    }
}
