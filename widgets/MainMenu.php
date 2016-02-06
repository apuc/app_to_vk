<?php

namespace widgets;
use lib\Widget;

/**
 * Created by PhpStorm.
 * User: Кирилл
 * Date: 06.02.2016
 * Time: 11:13
 */
class MainMenu extends Widget
{

    public $user;

    public function start(){
        return $this->app->parser->renderW('main_menu', ['user' => $this->user], false);
    }

}