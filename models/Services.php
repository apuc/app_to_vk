<?php
/**
 * Created by PhpStorm.
 * User: Кирилл
 * Date: 08.02.2016
 * Time: 15:46
 */

namespace models;


use lib\Model;

/**
 * ������ ��� ������ � �������� "geobase_city"
 *
 * @property integer $id
 * @property string $name
 */

class Services extends Model
{

    /**
     * @inheritdoc
     */
    public function table_name(){
        return 'services';
    }

    /**
     * @inheritdoc
     */
    public function fields(){
        return [
            'id',
            'name',
        ];
    }

    /**
     * @inheritdoc
     */
    public function rules(){
        return [
            [['id','name'], 'required'],
            [['id'], 'integer'],
            [['name'], 'string']
        ];
    }


}