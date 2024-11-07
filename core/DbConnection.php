<?php

namespace app\core;

class DbConnection
{
    public function connect(){
        $mysqli = new \mysqli("localhost", "root", "", "vbis");
        $dbResult = $mysqli->query("select * from users");
        $user = $dbResult->fetch_assoc();
        return $mysqli;
    }
}