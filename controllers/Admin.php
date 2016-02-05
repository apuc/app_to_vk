<?php


class Admin extends Controller
{

    public function actionIndex(){
        $user = new User();
        $this->app->debug->prn($user->find()->all());
    }

}