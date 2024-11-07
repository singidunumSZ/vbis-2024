<?php
namespace app\controllers;

use app\core\BaseController;
use app\core\View;
use app\models\UserModel;
use app\core\DbConnection;
class UserController extends BaseController
{


    public function readUser()
    {
        $db = new DbConnection();
        $con = $db->connect();
        $dbResult = $con->query("select * from users limit 1");
        $user = $dbResult->fetch_assoc();



        $model = new UserModel();
        $model->email =$user['email'];
        $model-> firstName = $user['first_name'];
        $model->lastName = $user['last_name'];



        $this->view->render('getUser', 'main', $model);

    }
}