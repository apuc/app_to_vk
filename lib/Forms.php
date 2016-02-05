<?php


class Forms
{

    public function dropDownList($name, $selected, $data, $options = false){
        $op = '';
        if($options){
            foreach($options as $k => $v){
                $op .= "$k = '$v' ";
            }
        }
        $d = '';
        foreach($data as $k => $v){
            if($k == $selected){
                $d .= "<option selected value='$k'>$v</option>";
            }
            else {
                $d .= "<option value='$k'>$v</option>";
            }
        }
        return "<select name='$name' $op>$d</select>";
    }

}