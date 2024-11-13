<?php

namespace app\core;

abstract class BaseModel
{

    abstract public function tableName();

    abstract public function readColumns();

    public function one($where)
    {
        $db = new DbConnection();
        $con = $db->connect();
        $tableName = $this->tableName();
        $columns = $this->readColumns();

        $query = "select " . implode(', ', $columns) . " from $tableName $where limit 1";


        $dbResult = $con->query($query);
        $result = $dbResult->fetch_assoc();

        if($result != null){
            $this->mapData($result);

        }

    }

    public function all($where): array
    {
        $db = new DbConnection();
        $con = $db->connect();
        $tableName = $this->tableName();
        $columns = $this->readColumns();

        $query = "select " . implode(', ', $columns) . " from $tableName $where ";


        $dbResult = $con->query($query);
        $results = $dbResult->fetch_all();


        return $results;


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