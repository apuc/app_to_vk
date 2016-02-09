<?php
use widgets\MainAdminMenu;
use widgets\MainMenu;
?>
<?= MainMenu::run(); ?>
<?= MainAdminMenu::run(); ?>
<h1>Виды сервисов</h1><span><a href="/vk2/admin/add_service" class="btn btn-success">Добавить сервис</a></span>
<table class="table table-hover">
    <tr>
        <th>
            #
        </th>
        <th>Название</th>
        <th></th>
    </tr>
    <?php
    $i = 1;
    foreach($service as $serv):?>
        <tr>
            <td><?= $i; ?></td>
            <td><?= $serv['name']; ?></td>
            <td>
                 <a class="admin_edit" href="/vk2/admin/edit_service/?id=<?= $serv['id']?>"></a>
                <a class="admin_delete" href="/vk2/admin/delete_service/?id=<?= $serv['id']?>"></a>
            </td>
        </tr>
        <?php $i++;?>
    <?php endforeach;?>
</table>
