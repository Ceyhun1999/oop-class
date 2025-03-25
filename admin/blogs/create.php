<?php
include '../layout/header.php';
?>

<div class="main">
    <h1>Создать блог</h1>
    <form action="crud/insert.php" method="post" style="max-width: 800px;"  enctype="multipart/form-data">
        <div style="margin-bottom: 15px;">
            <label for="title" style="display: block; margin-bottom: 5px;">Заголовок:</label>
            <input type="text" name="title" id="title" required style="width: 100%; padding: 8px;">
        </div>
        <div style="margin-bottom: 15px;">
            <label for="description" style="display: block; margin-bottom: 5px;">Полное описание:</label>
            <textarea name="description" id="default-editor"> </textarea>
        </div>
        <div style="margin-bottom: 15px;">
            <label for="image" style="display: block; margin-bottom: 5px;">Картинка:</label>
            <input type="file" name="image" id="image" required style="width: 100%; padding: 8px;">
        </div>
        <div>
            <input type="submit" value="Создать блог" style="padding: 10px 20px; background-color: #3498db; color: #fff; border: none; border-radius: 4px; cursor: pointer;">
        </div>
    </form>
</div>

<?php include '../layout/footer.php'; ?>