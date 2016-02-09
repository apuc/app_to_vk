<?php


use lib\Controller;
use lib\helpers\Cookie;
use lib\helpers\Debug;
use lib\helpers\Header;
use models\GeobaseCity;
use models\GeobaseRegion;
use models\Services;
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

    public function actionUser_list(){
        $num = 6;
        if (isset($_GET['page'])) {
            $page = $_GET['page'];
        } else {
            $page = 1;
        }


        $user = new User();
        $user->find()->where(['vk_id' => Cookie::get('vk_id')])->one();
        $allUser = $user->find()->all();
        $kol = 0;
        foreach ($allUser as $au) {
            $kol++;
        }
        $total = intval(($kol - 1) / $num) + 1;
        $page = intval($page);

        $start = $page * $num - $num;

        $allUserPage = $user->find()->orderBy('dt_add','DESC')->limit($num, $start)->all();

        $this->app->parser->render('user_list',
            [
                'user' => $user,
                'allUser' => $allUserPage,
                'kol' => $kol,
                'num' =>$num,
                'page' => $page,
                'total' => $total,
            ]);
    }

    public function actionDelete_user()
    {
        $user = new User();
        $user->deleteAll($_GET['id']);
        Header::redirect('/vk2/admin/user_list', true, 302);
    }

    public function actionView_user(){
        $user = new User();
        /*$user->find()->where(['vk_id' => Cookie::get('vk_id')])->one();*/
        $viewUser = $user->find()->where(['id'=>$_GET['id']])->one();
        $region = new GeobaseRegion();
        $city = new GeobaseCity();
        $regionUser = $region->find()->where(['id' => $viewUser['region_id']])->one();
        $cytiUser = $city->find()->where(['id' => $user->city_id])->one();
        $this->app->parser->render('view_user',
            [
                'viewUser' => $viewUser,
                'regionUser' => $regionUser,
                'cityUser' => $cytiUser,
            ], true);
    }

    public function actionEdit_status(){
        $user = new User;
        $user->find()->where(['id'=>$_POST['userID']])->one();
        $user->status = $_POST['status'];
        $user->save();
    }

    public function actionService_list(){
        $service = new Services();
        $services = $service->find()->all();
        $this->app->parser->render('service_list',
            [
                'service' => $services,
            ], true);
    }

    public function actionAdd_service(){
        $this->app->parser->render('_form_services',
            [
                'title'=>'Добавить сервис',
            ]);
    }

    public function actionAdd_to_sql(){
        $service = new Services();
        if(empty($_POST['id_service'])){
            $service->name = $_POST['name_service'];

            $service->save();
        }
        else{
            $service->find()->where(['id'=>$_POST['id_service']])->one();
            $service->name = $_POST['name_service'];
            $service->save();

        }

        Header::redirect('/vk2/admin/service_list', true, 302);
    }

    public function actionDelete_service(){
        $service = new Services();
        $service->deleteAll($_GET['id']);
        Header::redirect('/vk2/admin/service_list', true, 302);
    }


    public function actionEdit_service(){
        $service = new Services();
        $servic = $service->find()->where(['id'=>$_GET['id']])->one();
        $this->app->parser->render('_form_services',
            [
                'service' => $servic,
                'title' => 'Редактирование сервиса',
            ]);
    }
}