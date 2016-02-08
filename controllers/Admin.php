<?php


use lib\Controller;
use lib\helpers\Cookie;
use lib\helpers\Debug;
use models\User;
use widgets\MainMenu;

class Admin extends Controller
{

    public function actionIndex(){
        $user = new User();
        $user->find()->where(['vk_id' => Cookie::get('vk_id')])->one();
        $this->app->parser->render('index', [
            'user' => $user
        ]);
    }

}