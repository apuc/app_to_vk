<?php

use lib\Controller;
use models\User;

class Site extends Controller
{

    public function actionIndex(){
        $user = new User();
        $user->name = "Тормоз";
        $user->dt_add = time();
        $user->vk_id = 1;
        $user->status = 6;
        $user->ip = '123';
        $user->save();
        $this->app->parser->title = "Сайт";
        $this->app->parser->render('index', [
            'user' => $user
        ]);
    }

}