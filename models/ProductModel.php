<?php

namespace app\models;

use app\core\BaseModel;
use app\core\DbConnection;


class ProductModel extends BaseModel
{
    public int $id;
    public string $name = '';
    public string $description = '';
    public float $price = 0.0;



    public function tableName(): string
    {
       return "products";
    }

    public function readColumns(): array
    {
        return ["id","name", "description", "price"];
    }
    public function editColumns(): array
    {
        return ["name", "description", "price"]; //ovo je pogresno, editColumns se koristi za edit operacije
    }

    public function products(): array
    {
        return ["id","name", "description", "price"];
    }
    public function validationRules(): array{
        return[
            "name" => [self::RULE_REQUIRED],
            "description" => [self::RULE_REQUIRED],
            "price" => [self::RULE_REQUIRED],
        ];
    }
}