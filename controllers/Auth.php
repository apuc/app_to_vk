<?php



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
            $this->app->cookie->set('vk_id', $user->vk_id);
            $this->app->cookie->set('name', $user->name);
            $this->app->parser->render('reg', ['post' => $_POST], true);
        }
        else {
            $this->app->cookie->set('vk_id', $user->vk_id);
            $this->app->cookie->set('name', $user->name);
            //$this->app->parser->render('office', ['post' => $_POST, 'user' => $user], true);
            header( 'Location: /vk2/office/my', true, 302 );
        }

    }

    public function actionReg(){
        $this->app->debug->prn($_GET);
    }

}