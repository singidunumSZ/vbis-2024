<?php

namespace app\models;

use app\core\Application;
use app\core\BaseModel;
use DateTime;
class ReportModel extends BaseModel
{
    public string $from = '';
    public string $to = '';
    public function getNumberOfPurchasesPerMonth()
    {
        $id_user = 0;
        $sessions = Application::$app->session->get('user');

        foreach ($sessions as $session) {
            $id_user = $session['id_user'];
        }

        $dbResult = $this->con->query("SELECT MONTHNAME(shop_time) as 'month', count(id) as 'number_of_reservations' FROM cart where id_user = $id_user group by MONTHNAME(shop_time);");


        $resultArray = [];

        while ($result = $dbResult->fetch_assoc()) {
            $resultArray[] = $result;
        }

        echo json_encode($resultArray);






    }
    public function getPricePerMonth()
    {
        $id_user = 0;
        $sessions = Application::$app->session->get('user');

        foreach ($sessions as $session) {
            $id_user = $session['id_user'];
        }

        $dbResult = $this->con->query("
                                            SELECT MONTHNAME(c.shop_time) as month, SUM(p.price) as price FROM cart c
                                            LEFT JOIN products p ON  c.id_products = p.id
                                            WHERE c.id_user = $id_user
                                            GROUP BY MONTH(c.shop_time);");

        $resultArray = [];

        while ($result = $dbResult->fetch_assoc()) {
            $resultArray[] = $result;
        }

        echo json_encode($resultArray);
    }

    public function getPricePerUser()
    {
        if (!$this->from || $this->from == '') {
            $fromDate = new DateTime('2024-01-01');
            $this->from = $fromDate->format('Y-m-d');
        }

        if (!$this->to  || $this->to == '') {
            $toDate = new DateTime();
            $this->to = $toDate->format('Y-m-d');
        }

        $dbResult = $this->con->query("SELECT 
    u.email,
    SUM(p.price) AS price
FROM 
    cart c
LEFT JOIN 
    users u 
ON 
    c.id_user = u.id
LEFT JOIN 
    products p 
ON 
    c.id_products = p.id
WHERE 
    DATE(c.shop_time) BETWEEN '$this->from' AND '$this->to'
GROUP BY 
    u.email;");

        $resultArray = [];

        while ($result = $dbResult->fetch_assoc()) {
            $resultArray[] = $result;
        }

        echo json_encode($resultArray);
    }
   public function getNumberOfPurchasesS(){
       $id_user = 0;
       $sessions = Application::$app->session->get('user');

       foreach ($sessions as $session) {
           $id_user = $session['id_user'];
       }

       $dbResult = $this->con->query("SELECT 
    u.email, 
    COUNT(*) AS number_of_products
FROM 
    cart c
LEFT JOIN 
    users u 
ON 
    c.id_user = u.id
LEFT JOIN 
    products p 
ON 
    c.id_products = p.id
WHERE 
    c.size = 's'
GROUP BY 
    u.email;

                                            ");

       $resultArray = [];

       while ($result = $dbResult->fetch_assoc()) {
           $resultArray[] = $result;
       }

       echo json_encode($resultArray);
   }
    public function getNumberOfPurchasesM(){
        $id_user = 0;
        $sessions = Application::$app->session->get('user');

        foreach ($sessions as $session) {
            $id_user = $session['id_user'];
        }

        $dbResult = $this->con->query("SELECT 
    u.email, 
    COUNT(*) AS number_of_products
FROM 
    cart c
LEFT JOIN 
    users u 
ON 
    c.id_user = u.id
LEFT JOIN 
    products p 
ON 
    c.id_products = p.id
WHERE 
    c.size = 'm'
GROUP BY 
    u.email;

                                            ");

        $resultArray = [];

        while ($result = $dbResult->fetch_assoc()) {
            $resultArray[] = $result;
        }

        echo json_encode($resultArray);
    }
    public function getNumberOfPurchasesL(){
        $id_user = 0;
        $sessions = Application::$app->session->get('user');

        foreach ($sessions as $session) {
            $id_user = $session['id_user'];
        }

        $dbResult = $this->con->query("SELECT 
    u.email, 
    COUNT(*) AS number_of_products
FROM 
    cart c
LEFT JOIN 
    users u 
ON 
    c.id_user = u.id
LEFT JOIN 
    products p 
ON 
    c.id_products = p.id
WHERE 
    c.size = 'l'
GROUP BY 
    u.email;
   ");
        $resultArray = [];
        while ($result = $dbResult->fetch_assoc()) {
            $resultArray[] = $result;
        }
        echo json_encode($resultArray);
    }


    public function tableName()
    {
        return[];
    }

    public function readColumns()
    {
        return[];

    }

    public function editColumns()
    {
        return[];

    }

    public function validationRules()
    {
        return[];

    }
}