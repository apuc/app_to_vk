<?php

/**
 * Created by PhpStorm.
 * User: Кирилл
 * Date: 03.02.2016
 * Time: 9:05
 */
class Cookie
{

    public function set($name, $value, $time = false) {
        $time = ($time) ? $time : 3600;
        setcookie ($name, $value, time() + $time, "/", $_SERVER['HTTP_HOST']);
    }

    public function get($name) {
        if(isset($_COOKIE[$name])){
            return $_COOKIE[$name];
        }
        else {
            return false;
        }
    }

}