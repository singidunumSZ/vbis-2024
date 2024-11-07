<?php

namespace app\core;

abstract class BaseModel
{
    abstract public function tableName();

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