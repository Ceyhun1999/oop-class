<?php
include '../layout/header.php';
require_once '../class/Admin.php';

?>
<div class="main">
    <h1>Пользователи</h1>
    <p style="margin: 20px 0;">
        <?php
        if (isset($_SESSION['messageForUsersPage'])) {
            echo $_SESSION['messageForUsersPage'];
            unset($_SESSION['messageForUsersPage']);
           
        }
        echo  $_SESSION['username'];
        ?>
    </p>
    <!-- Кнопка для создания нового пользователя -->
    <a href="create.php" style="display: inline-block; margin-bottom: 15px; padding: 10px 20px; background-color: #3498db; color: #fff; text-decoration: none; border-radius: 4px;">Создать пользователя</a>

    <table style="width:100%; border-collapse: collapse;">
        <thead>
            <tr style="background-color: #f2f2f2;">
                <th style="border: 1px solid #ddd; padding: 8px;">Имя пользователя</th>
                <th style="border: 1px solid #ddd; padding: 8px;">Пароль</th>
                <th style="border: 1px solid #ddd; padding: 8px;">Действия</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $admin = new Admin;
            $list = $admin->list();
            if ($list->num_rows > 0) {
                while ($user = $list->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td style='border: 1px solid #ddd; padding: 8px;'>" . htmlspecialchars($user['email']) . "</td>";
                    echo "<td style='border: 1px solid #ddd; padding: 8px;'>" . htmlspecialchars($user['password']) . "</td>";
                    echo "<td style='border: 1px solid #ddd; padding: 8px;'>";
                    echo "<a href='edit.php?id=" . $user['id'] . "' style='display: inline-block; margin-right: 5px; padding: 5px 10px; background-color: #f1c40f; color: #fff; text-decoration: none; border-radius: 4px;'>Редактировать</a>";
                    echo "<a href='crud/delete.php?id=" . $user['id'] . "' style='display: inline-block; padding: 5px 10px; background-color: #e74c3c; color: #fff; text-decoration: none; border-radius: 4px;' onclick='return confirm(\"Вы уверены, что хотите удалить пользователя?\")'>Удалить</a>";
                    echo "</td>";
                    echo "</tr>";
                }
            } else {
                echo "0 results";
            }
            ?>
        </tbody>
    </table>
</div>
<?php include '../layout/footer.php' ?>