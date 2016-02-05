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
        $this->app->geo->ip = $this->app->routing->getRealIpAddr();
        echo $this->app->forms->dropDownList('test', 1, ['Яблоко', 'Груша'], ['class'=>'myClass', 'id'=>'myId', 'prompt'=>'Фрукты']);
        $geo = $this->app->geo->get_value();
        $this->app->debug->prn($this->app->routing->getRealIpAddr());
        $this->app->parser->render('index', [
            'user' => $user
        ], true);
    }

}