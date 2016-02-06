<?php
use lib\Controller;
use lib\helpers\Cookie;
use models\GeobaseCity;
use models\GeobaseRegion;
use models\User;

/**
 * Created by PhpStorm.
 * User: Кирилл
 * Date: 06.02.2016
 * Time: 10:54
 */
class Profile extends Controller
{

    public function actionMy(){
        $vk_id = Cookie::get('vk_id');
        $user = new User();
        $user->find()->where(['vk_id' => $vk_id])->one();
        $user->status = ($_GET['status'] == 1) ? 2 : 1;
        $user->save();
        $region = new GeobaseRegion();
        $city = new GeobaseCity();
        $regionAll = $region->find()->all();

        $this->app->parser->render('profile',
            [
                'user' => $user,
                'regionAll' => $regionAll,

            ]);
    }

}