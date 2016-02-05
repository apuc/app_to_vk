<?php

include_once('AssetsConfig.php');

class AppAssets
{
    public static function getCss(){
        $dop_dir = DOP_DIR;
        foreach(AssetsConfig::css() as $css){
            echo "<link href='$dop_dir/assets/$css' rel='stylesheet''>";
        }
    }

    public static function getJs(){
        $dop_dir = DOP_DIR;
        foreach(AssetsConfig::js() as $js){
            if($js[0] == '/'){
                echo "<script type='text/javascript' src='$js'></script>";
            }
            else {
                echo "<script type='text/javascript' src='$dop_dir/assets/$js'></script>";
            }
        }
    }
}