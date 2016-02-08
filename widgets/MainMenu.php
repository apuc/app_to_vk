<?php

namespace widgets;
use lib\helpers\Cookie;
use lib\Widget;
use models\User;

/**
 * Created by PhpStorm.
 * User: Кирилл
 * Date: 06.02.2016
 * Time: 11:13
 */
class MainMenu extends Widget
{

    public $user = false;

    public function start(){
        if($this->user){
            return $this->app->parser->renderW('main_menu', ['user' => $this->user], false);
        }
        else {
            $user = new User();
            $user->find()->where(['vk_id' => Cookie::get('vk_id')])->one();
            return $this->app->parser->renderW('main_menu', ['user' => $user], false);
        }

    }

}