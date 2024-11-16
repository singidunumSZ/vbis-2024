<?php

namespace app\core;

abstract class BaseModel
{

    abstract public function tableName();

    abstract public function readColumns();

    abstract public function editColumns();

    abstract public function products();

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

        $resultArray = [];
        while($result = $dbResult->fetch_assoc()){

            $resultArray[] = $result;
        }

        return $resultArray;

    }



    public function update($where)
    {
        $db = new DbConnection();
        $con = $db->connect();

        $tableName = $this->tableName();
        $columns = $this->editColumns();
        $columnsHelper = array_map(fn($attr) => ":$attr", $columns);

        $commonHelper = [];

        for($i = 0; $i < count($columnsHelper); $i++){
            $commonHelper[] = "$columns[$i] = $columnsHelper[$i]";
        }


        $query = "UPDATE $tableName SET " . implode(', ', $commonHelper) . " $where ";




        foreach($columns as $attribute){
            $query = str_replace(":$attribute", is_string($this->{$attribute}) ? '"' . $this->{$attribute} . '"' : $this->{$attribute}, $query);
        }
        $con->query($query);
        }

    public function insert()
    {
        $db = new DbConnection();
        $con = $db->connect();

        $tableName = $this->tableName();
        $columns = $this->editColumns();
        $columnsHelper = array_map(fn($attr) => ":$attr", $columns);

        $query = "insert into $tableName (" . implode(",", $columns) . ") values (" . implode(",", $columnsHelper) . ")";
        foreach($columns as $attribute){
            $query = str_replace(":$attribute", is_string($this->{$attribute}) ? '"' . $this->{$attribute} . '"' : $this->{$attribute}, $query);
        }
        $con->query($query);
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

    //}
}