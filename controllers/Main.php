<?php

/**
 * Created by PhpStorm.
 * User: Кирилл
 * Date: 01.02.2016
 * Time: 14:09
 */
class Main extends Controller
{

    public function actionIndex(){
        $this->app->parser->title = "Главная";
        $this->app->parser->render('index');
    }

}