<?php

define('ROOT_DIR', $_SERVER['DOCUMENT_ROOT']);
define('DOP_DIR', '');
define('DIR', ROOT_DIR . DOP_DIR);

include('lib/init.php');

if($url = $app->routing->start()){
    $controller = ucfirst($url['controller']);
    $site = new $controller();
    $action = "action" . ucfirst($url['action']);
    if(method_exists($site, $action)){
        $site->$action();
    }
    else {
        $error = new Error();
        $error->actionError404('Action');
    }
}
else {
    $error = new Error();
    $error->actionError404('Контроллер');
}


