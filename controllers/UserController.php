<?php
namespace app\controllers;
use app\models\ProductModel;
use app\core\BaseController;
use app\core\View;
use app\models\UserModel;
use app\core\DbConnection;
class UserController extends BaseController
{


    public function readUser()
    {

        $model = new UserModel();
        $result = $model->get();
        $model->mapData($result);
        echo "<pre>";
        var_dump($model);
        exit;

        $this->view->render('getUser', 'main', $model);

    }
}