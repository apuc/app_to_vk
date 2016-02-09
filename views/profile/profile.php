<?php
use lib\helpers\ArrayHelper;
use lib\helpers\Forms;
use models\GeobaseCity;
use widgets\MainMenu;

?>
<?= MainMenu::run(['user'=>$user]) ?>
<div class="infoStatus">Вы зарегистрированы как
    <?php


    if($user->status == 1):?>
            <span>Клиент</span>
        <?php endif;?>
    <?php if($user->status == 2):?>
            <span>Мастер</span>
        <?php endif;?>
</div>
<?php /*$app->debug->prn(ArrayHelper::map($regionAll,'id','name'));*/?>

    <div class="infoUser"><span>Имя: </span><?= $user->name; ?></div>
    <div class="infoUser"><span>Фамилия: </span><?= $user->last_name; ?></div>
<?= Forms::begin(['role'=>'form'],'POST','/vk2/profile/save_profile');?>
    <span>Email:</span>
    <?= Forms::inputText('email', $user->email,['class' => 'form-control']);?>
    <span>Телефон:</span>
    <?= Forms::inputText('phone', $user->phone,['class' => 'form-control']);?>

    <?php if($user->status == 2 || $user->status == 3): ?>
        <span>Ссылка на портфолио:</span>
        <?= Forms::inputText('link',$user->link,['class'=>'form-control']); ?>
        <p class="bg-danger">Выберите услуги которые предоставляете</p>
        <?= Forms::checkboxList('services', $selectServ, ArrayHelper::map($services,'id','name'));?>
    <?php endif; ?>

    <p class="bg-danger">Выберите свое месторасположение</p>
    <div><span>Регион:</span>
        <?= Forms::dropDownList('region_id',$user->region_id, ArrayHelper::map($regionAll,'id','name'),['class' => 'region form-control','prompt'=>'Выберите регион']);?>
    </div>

    <div class="city">
        <?php
            if(isset($user->region_id)){
                $city = new GeobaseCity();
                $cityAll = $city->find()->where(['region_id'=>$user->region_id])->orderBy('name','ASC')->all();
                //\lib\helpers\Debug::prn($user->regionId);
                echo "<span>Город:</span>";
                echo Forms::dropDownList('city_id', $user->city_id, ArrayHelper::map($cityAll, 'id', 'name'),['class'=>'form-control']);
            }
        ?>
    </div>
    <?= Forms::input('submit','saveProfile','Сохранить',['class'=>'btn btn-success']);?>
<?= Forms::end();?>

