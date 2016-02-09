<?php
use assets\AppAssets;
?>

<html>
    <head>
        <meta charset="UTF-8">
        <?php AppAssets::getCss(); ?>
        <title><?=$title?></title>
        <?php AppAssets::getJs(); ?>
    </head>
    <body>
        <div class="wrap" flag="0">
            <?=$content?>
        </div>
    <span id="current_day" month="<?=date('m')?>" year="<?=date('Y')?>"></span>
    </body>
</html>
