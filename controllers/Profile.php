<?php


class Profile extends Controller
{
    public function actionProfile(){
        $vk_id = $this->app->cookie->get('vk_id');
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