<?php

namespace app\core;

use mysqli;

class DbConnection
{
    public function connect(){
        return new mysqli("localhost", "root", "", "vbis");
    }
}