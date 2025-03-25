<?php
session_start();
require_once '../../class/Project.php';

function sessionMessage($text)
{
    $_SESSION['messageForPageProject'] = $text;
    header('location: ../');
    exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    if (isset($_GET['id'])) {
        $project = new Project;
        $id = mysqli_real_escape_string($project->db->conn, $_GET['id']);
        if ($project->delete($id)) {
            sessionMessage('Проект удален');
        } else {
            sessionMessage('Ошибка');
        };
    }
}
