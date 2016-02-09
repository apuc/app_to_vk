<?php


use lib\Controller;
use lib\helpers\Cookie;
use lib\helpers\Debug;
use lib\helpers\Header;
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
        $user = new User();
        $user->find()->where(['vk_id' => Cookie::get('vk_id')])->one();
        $allUser = $user->find()->orderBy('dt_add','DESC')->all();
        $this->app->parser->render('user_list',
            [
                'user' => $user,
                'allUser' => $allUser,
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
        $region = new \models\GeobaseRegion();
        $cyti = new \models\GeobaseCity();
        $regionUser = $region->find()->where(['id' => $viewUser->region_id])->one();
        $cytiUser = $cyti->find()->where(['id' => $viewUser->cyti_id])->one();
        $this->app->parser->render('view_user',
            [
                'viewUser' => $viewUser,
                'regionUser' => $regionUser,
                'cytiUser' => $cytiUser,
            ], true);
    }

    public function actionEdit_status(){
        $user = new User;
        $user->find()->where(['id'=>$_POST['userID']])->one();
        $user->status = $_POST['status'];
        $user->save();
    }

}