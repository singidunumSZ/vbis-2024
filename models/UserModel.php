<?php
namespace app\models;
use app\core\DbConnection;
use app\core\BaseModel;
class UserModel extends BaseModel
{
    public string $email;
    public string $first_name;
    public string $last_name;

    public function __construct(){

    }

    public function tableName(){
        return "users";
    }

    public function readColumns()
    {
        return ["first_name", "last_name", "email"];
    }
}