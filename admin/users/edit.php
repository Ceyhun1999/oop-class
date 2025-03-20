<?php
session_start();
include '../layout/header.php';
require_once '../class/Admin.php';
$admin = new Admin;
if ($_SERVER['REQUEST_METHOD'] === "GET") {
    if (isset($_GET['id']) && !empty(trim($_GET['id']))) {
        $id = $_GET['id'];;
        $email = $admin->getById($id) ? $admin->getById($id) : '';
    }
}

?>

<div class="main">
    <h1>Редактирование пользователя</h1>

    <form action="crud/update.php" method="post" style="max-width: 400px;">
        <!-- Передаем ID пользователя скрытым полем -->
        <input type="hidden" name="id" value="<?= $id ?>">

        <div style="margin-bottom: 15px;">
            <label for="email" style="display: block; margin-bottom: 5px;">Email:</label>
            <input type="text"  name="email" id="email" required style="width: 100%; padding: 8px;" value="<?= $email ?>">
        </div>
        <div style="margin-bottom: 15px;">
            <label for="password" style="display: block; margin-bottom: 5px;">Пароль:</label>
            <input type="password" name="password" id="password" style="width: 100%; padding: 8px;" placeholder="Оставьте поле пустым, если пароль не меняется">
        </div>
        <div>
            <input type="submit" value="Сохранить изменения" style="padding: 10px 20px; background-color: #3498db; color: #fff; border: none; border-radius: 4px; cursor: pointer;">
        </div>
    </form>
</div>

<?php include '../layout/footer.php'; ?>