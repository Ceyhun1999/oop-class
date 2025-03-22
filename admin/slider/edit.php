<?php
include '../layout/header.php';
require_once '../class/Slider.php';
if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    if (isset($_GET['id'])) {
        $id = $_GET['id'];
        $slider = new Slider;
        $escapedId = mysqli_real_escape_string($slider->db->conn, $id);
        $result = $slider->getById($escapedId);
        if ($result->num_rows > 0) {
            $slide = $result->fetch_assoc();
        }
    }
}

?>

<div class="main">
    <h1>Обновить слайд</h1>
    
    <form action="crud/update.php" method="post" style="max-width: 400px;" enctype="multipart/form-data">
    <input type="hidden" name="id" value="<?= $id ?>">
        <div style="margin-bottom: 15px;">
            <label for="title" style="display: block; margin-bottom: 5px;">Заголовок:</label>
            <input value="<?= $slide['title'] ?>" type="text" name="title" id="title" required style="width: 100%; padding: 8px;">
        </div>
        <div style="margin-bottom: 15px;">
            <label for="image" style="display: block; margin-bottom: 5px;">Картинка:</label>
            <input type="file" name="image" id="image" required style="width: 100%; padding: 8px;">
        </div>
        <div style="margin-bottom: 15px;">
            <img width="80" height="80" style="object-fit: cover;" src="<?= "../uploads/$slide[image]" ?>">
        </div>
        <div>
            <input type="submit" value="Обновить слайд" style="padding: 10px 20px; background-color: #3498db; color: #fff; border: none; border-radius: 4px; cursor: pointer;">
        </div>
    </form>
</div>

<?php include '../layout/footer.php'; ?>