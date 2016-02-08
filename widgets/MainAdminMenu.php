<?php
/**
 * Created by PhpStorm.
 * User: Îôèñ
 * Date: 08.02.2016
 * Time: 12:41
 */

namespace widgets;


use lib\Widget;

class MainAdminMenu extends Widget
{
    public function start(){
        return $this->app->parser->renderW('main_admin_menu', false);
    }
}