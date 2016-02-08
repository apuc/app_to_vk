<?php

use lib\Controller;
use lib\helpers\Cookie;
use lib\helpers\Header;
use models\User;

class Auth extends Controller
{

    public function actionAuth(){
        $user = new User();
        $user->find()->where(['vk_id' => $_POST['id']])->one();

        if(!isset($user->id)){
            $user->name = $_POST['name'];
            $user->last_name = $_POST['last_name'];
            $user->vk_id = $_POST['id'];
            $user->photo = $_POST['photo'];
            $user->dt_add = time();
            $user->status = 1;
            $user->ip = $this->app->getRealIpAddr();
            $user->save();
            Cookie::set('vk_id', $user->vk_id);
            Cookie::set('name', $user->name);
            $this->app->parser->render('reg', ['post' => $_POST], true);
        }
        else {
            Cookie::set('vk_id', $user->vk_id);
            Cookie::set('name', $user->name);
            //$this->app->parser->render('office', ['post' => $_POST, 'user' => $user], true);
            if($user->vk_id == '2840615'){
                header( 'Location: /vk2/office/my', true, 302 );
            }
            else {
                header( 'Location: /vk2/admin/index', true, 302 );
            }

        }

    }

    public function actionReg(){
        $vk_id = Cookie::get('vk_id');
        $user = new User();
        $user->find()->where(['vk_id' => $vk_id])->one();
        $user->status = ($_GET['status'] == 1) ? 2 : 1;
        $user->save();
        Header::redirect('/vk2/profile/my', true, 302);
        /*$this->app->parser->render('profile',
            [
                'user' =>$user,
            ]);*/
    }

}