<?php
require_once '../class/Blog.php';
include '../layout/header.php';

if ($_SERVER['REQUEST_METHOD'] === "GET") {
    if (isset($_GET['id'])) {
        $blog = new Blog;
        $id = mysqli_real_escape_string($blog->db->conn, $_GET['id']);

        $result = $blog->getById($id);
        if ($result->num_rows > 0) {
            $blogItem = mysqli_fetch_assoc($result);
        }
    }
}

?>

<div class="main">
    <h1>Редактировать блог</h1>
    <form action="crud/update.php" method="post" style="max-width: 800px;" enctype="multipart/form-data">
        <input type="hidden" name="id" value="<?= $id ?>">
        <div style="margin-bottom: 15px;">
            <label for="title" style="display: block; margin-bottom: 5px;">Заголовок:</label>
            <input type="text" value="<?= $blogItem['title'] ?>" name="title" id="title" required style="width: 100%; padding: 8px;">
        </div>
        <div style="margin-bottom: 15px;">
            <label for="description" style="display: block; margin-bottom: 5px;">Полное описание:</label>
            <textarea name="description" id="default-editor"> <?= $blogItem['description'] ?></textarea>
        </div>

        <div>
            <?php
            echo  "<img style='object-fit:cover' width='100%' height='80' src='../uploads/$blogItem[image]' />";
            ?>
        </div>

        <div style="margin-bottom: 15px;">
            <label for="image" style="display: block; margin-bottom: 5px;">Картинка:</label>
            <input type="file" name="image" id="image" required style="width: 100%; padding: 8px;">
        </div>
        <div>
            <input type="submit" value="Редактировать блог" style="padding: 10px 20px; background-color: #3498db; color: #fff; border: none; border-radius: 4px; cursor: pointer;">
        </div>
    </form>
</div>

<?php include '../layout/footer.php'; ?>