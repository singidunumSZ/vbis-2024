<?php

namespace app\models;

use app\core\BaseModel;
use app\core\DbConnection;


class ProductModel extends BaseModel
{
    public int $id;
    public string $name;
    public string $description;
    public int $price;



    public function tableName()
    {
       return "products";
    }

    public function readColumns()
    {
        return ["id","name", "description", "price"];
    }
    public function editColumns()
    {
        return ["name", "description", "price"]; //ovo je pogresno, editColumns se koristi za edit operacije
    }

    public function products()
    {
        return ["id","name", "description", "price"];
    }
}