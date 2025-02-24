<?php

namespace app\models;

use app\core\BaseModel;
use app\core\DbConnection;


class CartModel extends BaseModel
{
    public int $id;
    public  $id_user;
    public string $size = '';
    public  $id_products;
    public  $shop_time ;







    public function tableName(): string
    {
       return 'cart';
    }

    public function readColumns(): array
    {
        return ['id', 'id_user', 'size' , 'id_products', 'shop_time'];
    }
    public function editColumns(): array
    {
        return [ 'id_user', 'size' , 'id_products', 'shop_time'];
    }


    public function validationRules(): array{
        return[
            'id_products' => [self::RULE_REQUIRED],
            'id_user' => [self::RULE_REQUIRED],
            'size' => [self::RULE_REQUIRED],
            'shop_time' => [self::RULE_REQUIRED]


        ];
    }
}