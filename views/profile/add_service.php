<?php

use lib\helpers\Forms;
use widgets\MainMenu;

echo MainMenu::run()
?>

<div class="add-service-box">
    <?= Forms::begin(['id'=>'myForm'], 'post', '/vk2/profile/my_services/')?>

    <?= Forms::label('Тип услуги', 'services', ['class'=>'form-control light_green']) ?>
    <?= Forms::dropDownList('service', 0, \lib\helpers\ArrayHelper::map($services, 'id', 'name'), [
        'class' => 'form-control',
        'id' => 'services',
        'prompt' => 'Выберите тип услуги',
    ]) ?>
    <br>
    <?= Forms::label('Название услуги', 'title', ['class'=>'form-control light_green']) ?>
    <?= Forms::inputText('title', '', ['class'=>'form-control', 'id'=>'title', 'placeholder'=>'']) ?>
    <br>
    <?= Forms::label('Цена', 'price', ['class'=>'form-control light_green']) ?>
    <?= Forms::input('number','price', '', ['class'=>'form-control', 'id'=>'price', 'placeholder'=>'']) ?>
    <br>
    <?= Forms::label('Описание', 'descr', ['class'=>'form-control light_green']) ?>
    <?= Forms::textarea('descr', '', ['class'=>'form-control', 'id'=>'descr', 'placeholder'=>'', 'rows'=>4]) ?>

    <button class="btn btn-success" type="submit">Добавить</button>

    <?= Forms::end() ?>
</div>
