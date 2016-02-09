<?php
use lib\Controller;
use lib\helpers\ArrayHelper;
use lib\helpers\Debug;
use lib\helpers\Forms;
use models\GeobaseCity;
use models\GeobaseRegion;
use models\Services;
use models\User;

/**
 * Created by PhpStorm.
 * User: Кирилл
 * Date: 08.02.2016
 * Time: 14:56
 */
class Search extends Controller
{

    public function actionIndex(){
        $region = new GeobaseRegion();
        $city = new GeobaseCity();
        $this->app->parser->render('index', [
            'region' => $region->find()->orderBy('name', 'ASC')->all(),
            'city' => $city->find()->orderBy('name', 'ASC')->all(),
        ]);
    }

    public function actionGet_city(){
        $city = new GeobaseCity();
        $cityAll = $city->find()->where(['region_id'=>$_POST['regionId']])->orderBy('name','ASC')->all();
        echo Forms::dropDownList('city_id', null, ArrayHelper::map($cityAll, 'id', 'name'),['class'=>'searchCity form-control','prompt'=>'Выберите город']);
    }

    public function actionGet_service(){
        $service = new Services();
        $cityAll = $service->find()->orderBy('name','ASC')->all();
        echo Forms::dropDownList('service', null, ArrayHelper::map($cityAll, 'id', 'name'),['class'=>'searchService form-control','prompt'=>'Выберите услугу']);
    }

    public function actionSearching(){
        $user = new User();
        $res = $user
            ->find('`user`.*')
            ->leftJoin('user_services','`user_services`.`user_id` = `user`.`id`')
            ->where([
                'status' => 2,
                'region_id' => $_POST['regionId'],
                'city_id' => $_POST['cityId'],
                'service_id' => $_POST['serviceId']
            ])
            ->all();
        $this->app->parser->render('searching_result', [
            'result' => $res
        ], true);
    }

}