<?php

namespace lib\helpers;

class Forms
{
    /**
     * Начало формы
     * @param bool|false $options array Опции
     * @param $method string Метод
     * @param $action string Экшен
     * @return string
     */
    public static function begin($options = false, $method = 'POST', $action = ''){
        $op = self::getOptions($options);
        return "<form action='$action' method='$method' $op>";
    }

    /**
     * Конец формы
     * @return string
     */
    public static function end(){
        return "</form>";
    }

    /**
     * Выпадающий список
     * @param $name string
     * @param $selected integer
     * @param $data array
     * @param bool|false $options array
     * @return string
     */

    public static function dropDownList($name, $selected, $data, $options = false){
        $d = '';
        if($options['prompt']){
            $d .= "<option>".$options['prompt']."</option>";
        }
        foreach($data as $k => $v){

            if($k == $selected && $selected != 0){
                $d .= "<option selected value='$k'>$v</option>";
            }
            else {
                $d .= "<option value='$k'>$v</option>";
            }
        }
        unset ($options['prompt']);
        $op = self::getOptions($options);
        /*if($options){
            foreach($options as $k => $v){
                $op .= "$k = '$v' ";
            }
        }*/

        return "<select name='$name' $op>$d</select>";
    }

    /**
     * @param $type string
     * @param $name string
     * @param string $value
     * @param bool|false $options array
     * @return string
     */
    public static function input($type, $name, $value = '',$options = false){
        $op = self::getOptions($options);
        return "<input type='$type' name='$name' value='$value' $op>";
    }

    /**
     * @param $name string
     * @param string $value
     * @param bool|false $options array
     * @return string
     */

    public static function textarea($name,$value = '', $options = false){
        $op = self::getOptions($options);
        return "<textarea name='$name' $op>$value</textarea>";
    }

    /**
     * @param $options array
     * @return string
     */
    public static function getOptions($options){
        $op = '';
        if($options){
            foreach ($options as $key => $value) {
                $op .= "$key = '$value'";
            }
        }
        return $op;
    }

}