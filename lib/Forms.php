<?php


class Forms
{

    public function dropDownList($name, $selected, $data, $options = false){
        $d = '';
        if($options['prompt']){
            $d .= "<option selected >".$options['prompt']."</option>";
        }
        foreach($data as $k => $v){

            if($k == $selected && $selected != 0){
                $d .= "<option selected value='$k'>$v</option>";
            }
            else {
                $d .= "<option value='$k'>$v</option>";
            }
        }

        $op = '';
        if($options){
            foreach($options as $k => $v){
                $op .= "$k = '$v' ";
            }
        }

        return "<select name='$name' $op>$d</select>";
    }

}