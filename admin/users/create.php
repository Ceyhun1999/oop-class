<?php
session_start();
include '../layout/header.php';
require_once '../class/Admin.php';
?>

<div class="main">
    <h1>Создать пользователя</h1>

    <form action="crud/insert.php" method="post" style="max-width: 400px;">
        <div style="margin-bottom: 15px;">
            <label for="email" style="display: block; margin-bottom: 5px;">Email:</label>
            <input type="text" name="email" id="email" required style="width: 100%; padding: 8px;">
        </div>
        <div style="margin-bottom: 15px;">
            <label for="password" style="display: block; margin-bottom: 5px;">Пароль:</label>
            <input type="password" name="password" id="password" required style="width: 100%; padding: 8px;">
        </div>
        <div>
            <input type="submit" value="Создать пользователя" style="padding: 10px 20px; background-color: #3498db; color: #fff; border: none; border-radius: 4px; cursor: pointer;">
        </div>
    </form>
</div>

<?php include '../layout/footer.php'; ?>