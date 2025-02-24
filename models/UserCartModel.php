<?php

namespace app\models;

use app\core\Application;
use app\core\BaseModel;
use app\core\DbConnection;


class UserCartModel extends BaseModel
{

    public string $name = '';
    public string $description = '';
    public string $model = '';
    public string $size = '';
    public string $shop_time = '';


    public string $image_name  = '';
    public float $price = 0.0;




    public function tableName(): string
    {
       return '';
    }

    public function readColumns(): array
    {
        return ['id', 'name', 'description', 'model', 'image_name','price' , 'size','shop_time'];
    }
   public function editColumns()
   {
       return[];
   }

    public function validationRules(): array{
        return[
        'size'=>[self::RULE_REQUIRED],
'shop_time'=>[self::RULE_REQUIRED],
        ];
    }

    public function getCartData(){

        $id_user = 0;

        $sessions = Application::$app->session->get('user');

        foreach ($sessions as $session) {
            $id_user = $session['id_user'];
            }


        $query = "SELECT  * FROM cart c
LEFT JOIN products p ON c.id_products = p.id
WHERE c.id_user = $id_user";


        $dbResult = $this->con->query($query);

        $resultArray = [];
        while($result = $dbResult->fetch_assoc()){

            $resultArray[] = $result;
        }

        return $resultArray;



    }
}