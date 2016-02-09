<?php
use widgets\MainAdminMenu;
use widgets\MainMenu;
?>

<?= MainMenu::run()?>
<?= MainAdminMenu::run(); ?>
<h1>Профиль пользователя:</h1>
<div><span>Имя:</span><?= $viewUser['name']; ?></div>
<div><span>Фамилия:</span><?= $viewUser['last_name']; ?></div>
<div><span>Email:</span><?= $viewUser['email']; ?></div>
<div><span>Телефон:</span><?= $viewUser['phone']; ?></div>
<div><span>Регион:</span><?= $regionUser['name']; ?></div>
<div><span>Город:</span><?= $cityUser['name']; ?></div>

