
<?php use lib\helpers\Forms;
use lib\helpers\Pagination;
use widgets\MainAdminMenu;
use widgets\MainMenu;

echo MainMenu::run(['user' => $user]);
echo  MainAdminMenu::run();
?>
<h1>Пользователи</h1>
<table class="table table-hover">
    <tr>
        <th>
            #
        </th>
        <th>Имя</th>
        <th>Фамилия</th>
        <th>vk id</th>
        <th>Дата регистрации</th>
        <th>Статус</th>
        <th></th>
    </tr>
    <?php
    $i = 1;
    foreach($allUser as $us):?>
        <tr>
            <td><?= $i; ?></td>
            <td><?= $us['name']; ?></td>
            <td><?= $us['last_name']; ?></td>
            <td><?= $us['vk_id']; ?></td>
            <td><?= date('d-m-Y',$us['dt_add']); ?></td>
            <td><?= Forms::dropDownList('status',$us['status'],['1'=>'Клиент','2'=>'Мастер','3'=>'Админ'],['class'=>'form-control status','userId'=>$us['id']]);

               /* switch($us['status']){
                    case 1: echo 'Клиент';break;
                    case 2: echo 'Мастер';break;
                    case 3: echo 'Админ';break;
                } */?></td>
            <td><a class="admin_view" href="/vk2/admin/view_user/?id=<?= $us['id']?>"></a>
               <!-- <a class="admin_edit" href="/vk2/admin/edit_user/?id=<?/*= $us['id']*/?>"></a>-->
                <a class="admin_delete" href="/vk2/admin/delete_user/?id=<?= $us['id']?>"></a>
        </tr>
        <?php $i++;?>
    <?php endforeach;?>


</table>

<?= Pagination::pag($kol, $num, '/vk2/admin/user_list/', $page, $total)?>