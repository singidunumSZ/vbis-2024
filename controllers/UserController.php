<?php
namespace app\controllers;

use app\core\BaseController;
use app\core\View;
use app\models\UserModel;

class UserController extends BaseController
{


    public function readUser()
    {
        $model = new UserModel();
        $model->email ='sara.zivkovic.22@singimail.rs';
        $model-> firstName ='Sara';
        $model->lastName ='Zivkovic';



        $this->view->render('getUser', 'main', $model);

    }
}