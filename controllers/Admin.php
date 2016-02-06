<?php


use lib\Controller;
use lib\helpers\Debug;
use models\User;
use widgets\MainMenu;

class Admin extends Controller
{

    public function actionIndex(){
        $user = new User();
        $u = $user->find()->all();
        $this->app->parser->render('index', ['user' => $u[0]], true);
    }

}