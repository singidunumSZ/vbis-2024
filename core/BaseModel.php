<?php

namespace app\core;

abstract class BaseModel
{

    abstract public function tableName();

    abstract public function readColumns();

    public function one()
    {
        $db = new DbConnection();
        $con = $db->connect();
        $tableName = $this->tableName();
        $columns = $this->readColumns();
        $query = "select " . implode(', ', $columns) . " from $tableName";


        $dbResult = $con->query($query);
        $result = $dbResult->fetch_assoc();
        $this->mapData($result);
    }

    public function all()
    {
        $db = new DbConnection();
        $con = $db->connect();
        $tableName = $this->tableName();
        $columns = $this->readColumns();
        $query = "select " . implode(', ', $columns) . " from $tableName";


        $dbResult = $con->query($query);
        return $dbResult->fetch_assoc();
    }


        public function mapData($data){
        if($data != null){
            foreach ($data as $key => $value) {
                if(property_exists($this, $key)){
                    $this->{$key} = $value;
                }
            }
        }
        }
}