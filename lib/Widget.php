<?php

/**
 * Created by PhpStorm.
 * User: Кирилл
 * Date: 05.02.2016
 * Time: 11:59
 */
class Widget
{
    public $app;

    public function __construct(){
        $app = new App();
        $this->app = $app;
        $this->app->parser->widget = $this->className();
    }

    public function className(){
        return get_class($this);
    }

}