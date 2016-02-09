<?php
use lib\helpers\Forms;
use widgets\MainAdminMenu;
use widgets\MainMenu;
?>
<?= MainMenu::run(); ?>
<?= MainAdminMenu::run(); ?>
<h1><?= $title; ?></h1>
<?= Forms::begin(['role'=>'form'],'POST','/vk2/admin/add_to_sql'); ?>
<?= Forms::inputHidden('id_service',$service['id']); ?>
<span>Название сервиса</span>
<?= Forms::inputText('name_service',$service['name'],['class' => 'form-control']); ?>
<?= Forms::input('submit','saveProfile','Сохранить',['class'=>'btn btn-success']);?>
<?= Forms::end();?>
