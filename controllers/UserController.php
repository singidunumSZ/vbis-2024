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
        $model->one("where id = 1");


        $this->view->render('getUser', 'main', $model);

    }
    public function readAll()
    {

        $model = new UserModel();

        $results = $model->all("");


        $this->view->render('users', 'main', $results);

    }
    public function updateUser()
    {

        $model = new UserModel();
        $model->mapData($_GET);
        $model->one("where id = $model->id");


        $this->view->render('updateUser', 'main', $model);

    }
}