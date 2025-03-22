<?php
session_start();
require_once '../../class/Slider.php';
function sessionMessage($message)
{
    $_SESSION['messageForSliderPage'] = $message;
    header('Location: ../');
    exit;
}

if ($_SERVER['REQUEST_METHOD'] === "POST") {
    // Проверяем поле title
    $title = isset($_POST['title']) ? trim($_POST['title']) : '';


    if ($title === '') {
        sessionMessage("Заголовок не может быть пустым.");
    } elseif (!isset($_FILES['image'])) {
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
            $slider = new Slider;
            $escapedTitle = mysqli_real_escape_string($slider->db->conn, $title);
            $escapedImage = mysqli_real_escape_string($slider->db->conn, $uniqueName);

            if ($slider->insert($escapedTitle,  $escapedImage)) {
                sessionMessage('Слайд добавлен');
            } else {
                sessionMessage('Ошибка');
            }
        } else {
            sessionMessage("Ошибка при перемещении файла.");
        }
    }
}
