<div>Вы зарегистрированы как
    <?php
        if($user->status == 1):?>
            <span>Клиент</span>
        <?php endif;?>
    <?php if($user->status == 2):?>
            <span>Мастер</span>
        <?php endif;?>
</div>
<?php /*$app->debug->prn(ArrayHelper::map($regionAll,'id','name'));*/?>

<div><span>Имя: </span><?= $user->name; ?></div>
<div><span>Фамилия: </span><?= $user->last_name; ?></div>
<div><span>Фамилия: </span><?= $user->last_name; ?></div>
<div><span>Регион:</span>
    <?= $app->forms->dropDownList('region_id',$user->region_id,ArrayHelper::map($regionAll,'id','name'));?>
</div>

