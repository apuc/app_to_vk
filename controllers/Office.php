<?php

/**
 * Created by PhpStorm.
 * User: Кирилл
 * Date: 02.02.2016
 * Time: 16:21
 */
class Office extends Controller
{

    public function actionMy(){
        $user = new User();
        $user->find()->where(['vk_id' => $this->app->cookie->get('vk_id')])->one();
        $this->app->parser->render('index', [
            'user' => $user
        ], true);
    }

}