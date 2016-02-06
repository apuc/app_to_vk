<?php


use lib\Controller;
use lib\helpers\Debug;
use models\User;

class Admin extends Controller
{

    public function actionIndex(){
        $user = new User();
        Debug::prn($user->find()->all());
    }

}