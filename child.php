<?php

include('lib/CRUD.php');

class child extends CRUD
{

    public function fields()
    {
        return [
            'test' => '123'
        ];
    }

}