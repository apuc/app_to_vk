<?php
include ROOT_DIR . DOP_DIR . "/config/Config.php";

include "App.php";
$app = new App();

include "Controller.php";
include "Widget.php";
include "Db.php";
include "Model.php";
include "ArrayHelper.php";

$app->addModels();

include DIR . "/assets/AppAssets.php";