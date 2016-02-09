<?php
use widgets\MainMenu;

echo MainMenu::run();
?>
<?php if($msg != ''): ?>
    <h2 class="msg-success"><?=$msg?></h2>
<?php endif; ?>
<div class="my-service-box">
    <a href="/vk2/profile/add_service/" class="btn btn-success">Добавить услугу</a>
</div>
