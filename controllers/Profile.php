<?php
use lib\Controller;
use lib\helpers\ArrayHelper;
use lib\helpers\Cookie;
use lib\helpers\Forms;
use models\GeobaseCity;
use models\GeobaseRegion;
use models\Services;
use models\User;
use models\UserServices;

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
        $services = new Services();
        $serv = $services->find()->all();
        $this->app->parser->render('profile',
            [
                'user' => $user,
                'regionAll' => $regionAll,
                'services'=>$serv,
            ]);

    }

    public function actionSave_profile(){
        if(isset($_POST['saveProfile'])){

            \lib\helpers\Debug::prn($_POST);
            $user = new User();
            $usServ = new UserServices();
            $vk_id = Cookie::get('vk_id');



            $user->find()->where(['vk_id' => $vk_id])->one();
            $usServ->deleteByField('user_id',$user->id);
            $user->region_id = $_POST['region_id'];
            $user->city_id = $_POST['city_id'];
            $user->email = $_POST['email'];
            $user->phone = $_POST['phone'];
            $user->save();

            foreach($_POST['services'] as $serv){

                \lib\helpers\Debug::prn($serv);
                $usServ->user_id = $user->id;
                $usServ->service_id = $serv;
                $usServ->save();
            }
           // header( 'Location: /vk2/office/my', true, 302 );
        }
        else{
            \lib\helpers\Header::redirect('/vk2/profile/my', true, 302);
        }

    }

    public function actionMy_services(){
        $this->app->parser->render('my_service');
    }

    public function actionView_master(){
        $this->app->parser->render('view_master', [
            'user_id' => $_GET['id']
        ]);
    }

    public function actionAdd_service(){
        $services = new Services();
        $this->app->parser->render('add_service', [
            'services' => $services->find()->all()
        ]);
    }

    public function actionGet_master(){
        $master = new User();
        $master->find()->where(['id' => $_POST['user_id']])->one();
        $this->app->parser->renderCode('get_master',[
            'master' => $master
        ]);
    }

    public function actionGet_city(){
        $city = new GeobaseCity();
        $cityAll = $city->find()->where(['region_id'=>$_POST['regionId']])->orderBy('name','ASC')->all();
        echo "<span>Город:</span>";
        echo Forms::dropDownList('city_id', null, ArrayHelper::map($cityAll, 'id', 'name'),['class'=>'form-control','prompt'=>'Выберите город']);
    }

}