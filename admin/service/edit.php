<?php
include '../layout/header.php';
require_once '../class/Service.php';

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    if (isset($_GET['id'])) {
        $id = $_GET['id'];
        $service = new Service;
        $escapedId = mysqli_real_escape_string($service->db->conn, $id);
        $result = $service->getById($escapedId);
        if ($result->num_rows > 0) {
            $serviceItem = $result->fetch_assoc();
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
            <input value="<?= $serviceItem['title'] ?>" type="text" name="title" id="title" required style="width: 100%; padding: 8px;">
        </div>
        <div style="margin-bottom: 15px;">
            <label for="description" style="display: block; margin-bottom: 5px;">Полное описание:</label>
            <textarea value="<?= $serviceItem['description'] ?>" name="description" id="default-editor">
            <?php
            echo  "$serviceItem[description]";
            ?>     </textarea>
        </div>
        <div>
            <?php
            echo  "<img style='object-fit:cover' width='100%' height='80' src='../uploads/$serviceItem[image]' />";
            ?>
        </div>
      
        <div style="margin-bottom: 15px;">
            <label for="image" style="display: block; margin-bottom: 5px;">Картинка:</label>
            <input type="file" name="image" id="image" required style="width: 100%; padding: 8px;">
        </div>

        <div>
            <input type="submit" value="Обновить слайд" style="padding: 10px 20px; background-color: #3498db; color: #fff; border: none; border-radius: 4px; cursor: pointer;">
        </div>
    </form>
</div>

<?php include '../layout/footer.php'; ?>