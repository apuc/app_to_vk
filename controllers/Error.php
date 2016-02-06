<?php
use lib\Controller;

/**
 * Created by PhpStorm.
 * User: Кирилл
 * Date: 01.02.2016
 * Time: 11:26
 */
class Error extends Controller
{

    public function actionError404($err){
        echo "$err не найден";
    }

}