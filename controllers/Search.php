<?php
use lib\Controller;
use lib\helpers\ArrayHelper;
use lib\helpers\Forms;
use models\GeobaseCity;
use models\GeobaseRegion;
use models\Services;

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
        echo Forms::dropDownList('ыукмшсу', null, ArrayHelper::map($cityAll, 'id', 'name'),['class'=>'searchService form-control','prompt'=>'Выберите услугу']);
    }

}