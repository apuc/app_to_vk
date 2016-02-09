<?php

use lib\helpers\Forms;
use widgets\MainMenu;

echo MainMenu::run()
?>

<div class="add-service-box">
    <?= Forms::begin(['id'=>'myForm'], 'post')?>
    <?= Forms::label('Тип услуги', 'services', ['class'=>'form-control']) ?>
    <?= Forms::dropDownList('service', 0, \lib\helpers\ArrayHelper::map($services, 'id', 'name'), ['class' => 'form-control', 'id' => 'services']) ?>
    <br>
    <?= Forms::label('Название услуги', 'title', ['class'=>'form-control']) ?>
    <?= Forms::inputText('title', '', ['class'=>'form-control', 'id'=>'title', 'placeholder'=>'Например: ']) ?>
    <?= Forms::end() ?>
</div>
