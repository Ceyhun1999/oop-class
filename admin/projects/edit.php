<?php
include '../layout/header.php';
require_once '../class/Project.php';

if ($_SERVER['REQUEST_METHOD'] === "GET") {
    if (isset($_GET['id'])) {
        $project = new Project;
        $id = mysqli_real_escape_string($project->db->conn, $_GET['id']);
        if ($project->getById($id)->num_rows > 0) {
            $projectItem = mysqli_fetch_assoc($project->getById($id));
        }
    }
}

?>

<div class="main">
    <h1>Обновить сервис</h1>

    <form action="crud/update.php" method="post" style="max-width: 800px;" enctype="multipart/form-data">
        <input type="hidden" name="id" value="<?= $id ?>">
        <div style="margin-bottom: 15px;">
            <label for="title" style="display: block; margin-bottom: 5px;">Заголовок:</label>
            <input value="<?= $projectItem['title'] ?>" type="text" name="title" id="title" required style="width: 100%; padding: 8px;">
        </div>
        <div style="margin-bottom: 15px;">
            <label for="description" style="display: block; margin-bottom: 5px;">Полное описание:</label>
            <textarea value="<?= $projectItem['description'] ?>" name="description" id="default-editor">
            <?php
            echo  "$projectItem[description]";
            ?>     </textarea>
        </div>
        <div>
            <?php
            echo  "<img style='object-fit:cover' width='100%' height='80' src='../uploads/$projectItem[image]' />";
            ?>
        </div>

        <div style="margin-bottom: 15px;">
            <label for="image" style="display: block; margin-bottom: 5px;">Картинка:</label>
            <input type="file" name="image" id="image" required style="width: 100%; padding: 8px;">
        </div>

        <div>
            <input type="submit" value="Обновить проект" style="padding: 10px 20px; background-color: #3498db; color: #fff; border: none; border-radius: 4px; cursor: pointer;">
        </div>
    </form>
</div>

<?php include '../layout/footer.php'; ?>