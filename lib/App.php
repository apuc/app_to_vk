<?php

include "Parser.php";
include "Routing.php";
include "Debug.php";
include "CRUD.php";
include "Cookie.php";
include "Forms.php";
include "Geo.php";

class App
{
    public $debug;
    public $crud;
    public $routing;
    public $parser;
    public $cookie;
    public $forms;
    public $geo;

    public function __construct(){
        $this->parser = new Parser();
        $this->crud = new CRUD();
        $this->debug = new Debug();
        $this->routing = new Routing();
        $this->cookie = new Cookie();
        $this->forms = new Forms();
        $this->geo = new Geo();
    }

    public function addModels(){
        if ($handle = opendir(ROOT_DIR . DOP_DIR . '/models/')) {
            /* Именно этот способ чтения элементов каталога является правильным. */
            while (false !== ($file = readdir($handle))) {
                if ($file != "." && $file != "..") {
                    $classes[] = $file;
                    include (ROOT_DIR . DOP_DIR . "/models/" . $file);
                }
            }
            closedir($handle);
        }
    }

    public function getRealIpAddr()
    {
        if (!empty($_SERVER['HTTP_CLIENT_IP']))
        {
            $ip=$_SERVER['HTTP_CLIENT_IP'];
        }
        elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR']))
        {
            $ip=$_SERVER['HTTP_X_FORWARDED_FOR'];
        }
        else
        {
            $ip=$_SERVER['REMOTE_ADDR'];
        }
        return $ip;
    }

}