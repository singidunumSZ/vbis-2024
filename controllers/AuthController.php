<?php

namespace app\controllers;

use app\core\BaseController;
use app\models\AuthModel;
use app\models\ProductModel;


class AuthController extends BaseController
{
    public function registration(){
    $this->view->render('registration','auth', new AuthModel());
}

    public function processRegistration(){
        $model = new AuthModel();
        $model->mapData($_POST);
        $model->validate();

        if($model->errors){
            $this->view->render('registration', 'auth', $model);
            exit;
        }


      $model->insert();

        //todo add registration logic
        $this->view->render('registration','auth', new AuthModel());
    }
}