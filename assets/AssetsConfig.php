<?php

/**
 * Created by PhpStorm.
 * User: Кирилл
 * Date: 01.02.2016
 * Time: 14:24
 */
class AssetsConfig
{

    public static function css(){
        return [
            'css/bootstrap.min.css',
            'css/style.css',
        ];
    }

    public static function js(){
        return [
            'js/jquery.js',
            'js/bootstrap.min.js',
            '//vk.com/js/api/xd_connection.js?2',
            'js/vk.js',
            'js/script.js'
        ];
    }

}