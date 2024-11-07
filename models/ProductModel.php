<?php

namespace app\models;


use app\core\DbConnection;

class ProductModel extends BaseModel
{
    public string $name;
    public string $description;
    public string $price;

    public function get(){
        $db = new DbConnection();
        $con = $db->connect();
        $dbResult = $con->query(/** @lang text */ "select * from products limit 1");
        $products = $dbResult->fetch_assoc();

        $this->name =$products['name'];
        $this-> description = $products['description'];
        $this->price = $products['price'];
    }

    public function tableName()
    {
       return "products";
    }
}