<?php
use lib\Controller;
use lib\helpers\ArrayHelper;
use lib\helpers\Cookie;
use lib\helpers\Forms;
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
        /*$user->status = ($_GET['status'] == 1) ? 2 : 1;
        $user->save();*/
        $region = new GeobaseRegion();
        $regionAll = $region->find()->orderBy('name', 'ASC')->all();

        $this->app->parser->render('profile',
            [
                'user' => $user,
                'regionAll' => $regionAll,
            ]);

    }

    public function actionSave_profile(){
        if(isset($_POST['saveProfile'])){
            $user = new User();
            $vk_id = Cookie::get('vk_id');
            $user->find()->where(['vk_id' => $vk_id])->one();
            $user->region_id = $_POST['region_id'];
            $user->city_id = $_POST['city_id'];
            $user->email = $_POST['email'];
            $user->phone = $_POST['phone'];
            $user->save();
            header( 'Location: /vk2/office/my', true, 302 );
        }
        else{
            \lib\helpers\Header::redirect('/vk2/profile/my', true, 302);
        }

    }

    public function actionView_master(){
        
    }

    public function actionGet_city(){
        $city = new GeobaseCity();
        $cityAll = $city->find()->where(['region_id'=>$_POST['regionId']])->orderBy('name','ASC')->all();
        echo "<span>Город:</span>";
        echo Forms::dropDownList('city_id', null, ArrayHelper::map($cityAll, 'id', 'name'),['class'=>'form-control','prompt'=>'Выберите город']);
    }

}