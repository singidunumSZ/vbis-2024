<?php
namespace app\models;
use app\core\DbConnection;

class UserModel
{
    public string $email;
    public string $firstName;
    public string $lastName;

    public function __construct(){

    }
    public function get(){
        $db = new DbConnection();
        $con = $db->connect();
        $dbResult = $con->query(/** @lang text */ 'select * from users limit 1
');
        $user = $dbResult->fetch_assoc();

        $this->email =$user['email'];
        $this-> firstName = $user['first_name'];
        $this->lastName = $user['last_name'];
    }
}