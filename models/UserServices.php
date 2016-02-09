<?php
/**
 * Created by PhpStorm.
 * User: apuc0
 * Date: 09.02.2016
 * Time: 10:28
 */

namespace models;


use lib\Model;

/**
 * Модель для работы с таблицей "user_services"
 *
 * @property integer $id
 * @property string $user_id
 * @property string $service_id
 */

class UserServices extends Model
{
    /**
     * @inheritdoc
     */
    public function table_name(){
        return 'user_services';
    }

    /**
     * @inheritdoc
     */
    public function fields(){
        return [
            'id',
            'user_id',
            'service_id',
        ];
    }

    /**
     * @inheritdoc
     */
    public function rules(){
        return [
            [['id','user_id', 'service_id'], 'required'],
            [['id','user_id', 'service_id'], 'integer'],
        ];
    }
}