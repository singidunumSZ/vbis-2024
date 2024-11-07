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

        $model = new UserModel();
        $model->get();
        $this->view->render('getUser', 'main', $model);

    }
}