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
            if($user->vk_id == '2840615'){
                header( 'Location: /vk2/office/my', true, 302 );
            }
            else {
                header( 'Location: /vk2/auth/reg', true, 302 );
            }

        }

    }

    public function actionReg(){
        $vk_id = $this->app->cookie->get('vk_id');
        $user = new User();
        $user->find()->where(['vk_id' => $vk_id])->one();
        $user->status = ($_GET['status'] == 1) ? 2 : 1;
        $user->save();
        $this->app->debug->prn($vk_id);
    }

}