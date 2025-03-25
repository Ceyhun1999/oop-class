<?php
session_start();
function sessionMessage($text)
{
    $_SESSION['messageForBlogPage'] = $text;
    header('Location: ../');
    exit;
}

require_once '../../class/Blog.php';
if ($_SERVER['REQUEST_METHOD'] === "GET") {
    $blog = new Blog;

    if (isset($_GET['id'])) {
        $id = mysqli_real_escape_string($blog->db->conn, $_GET['id']);
        $result = $blog->delete($id);

        if ($result) {
            sessionMessage('Блог удален');
        } else {
            sessionMessage('Ошибка');
        }
    }
}
