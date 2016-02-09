<?php
/**
 * Created by PhpStorm.
 * User: apuc0
 * Date: 09.02.2016
 * Time: 14:33
 */

namespace models;


use lib\Model;
/**
 * Модель для работы с таблицей "services"
 *
 * @property integer $id
 * @property string $title
 * @property string $service_id
 * @property string $master_id
 * @property string $price
 */
class SubServices extends Model
{
    /**
     * @inheritdoc
     */
    public function table_name(){
        return 'sub_services';
    }

    /**
     * @inheritdoc
     */
    public function fields(){
        return [
            'id',
            'title',
            'service_id',
            'master_id',
            'price',
        ];
    }

    /**
     * @inheritdoc
     */
    public function rules(){
        return [
            [['title', 'service_id', 'master_id', 'price'], 'required'],
            [['id', 'service_id', 'master_id'], 'integer'],
            [['price', 'title'], 'string']
        ];
    }
}