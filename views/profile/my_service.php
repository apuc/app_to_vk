<?php
use widgets\MainMenu;

echo MainMenu::run();
?>
<?php if($msg != ''): ?>
    <h3 class="msg-success"><?=$msg?></h3>
<?php endif; ?>
<div class="my-service-box">
    <a href="/vk2/profile/add_service/" class="btn btn-success">Добавить услугу</a>
    <div class="my-services-box-all">
        <table class="table table-bordered">
            <caption>Мои услуги</caption>
            <tr>
                <th>Услуга</th>
                <th>Тип услуги</th>
                <th>Цена</th>
                <th width="50px">Действия</th>
            </tr>
            <?php foreach($sub as $s): ?>
            <tr>
                <td><?=$s['title']?></td>
                <td><?=$s['service_name']?></td>
                <td><?=$s['price']?></td>
                <td><a class="admin_delete" href="/vk2/profile/del_sub/?id=<?= $s['id'] ?>"></a></td>
            </tr>
            <?php endforeach; ?>
        </table>
    </div>
</div>