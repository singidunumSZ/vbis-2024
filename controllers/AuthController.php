<?php

namespace app\controllers;

use app\core\BaseController;
use app\models\AuthModel;
use app\models\ProductModel;
use app\models\RoleModel;
use app\models\UserRoleModel;


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

        $model->password = password_hash($model->password, PASSWORD_DEFAULT);


        $model->insert();
        $model->one("where email = '$model->email'");

        $roleModel = new RoleModel();
        $roleModel->one("where name = 'Korisnik'");

        $userRoleModel = new UserRoleModel();
        $userRoleModel->id_user = $model->id;
        $userRoleModel->id_role = $roleModel->id;
        $userRoleModel->insert();

        header("location:" . "/login");
    }


public function login(){
    $this->view->render('login','auth', new AuthModel());
}

public function processLogIn(){
    $model = new AuthModel();
    $model->mapData($_POST);
    $model->validate();

    if($model->errors){
        $this->view->render('login', 'auth', $model);
        exit;
    }

    $logInPassword = $model->password;

    $model->one("where email = '$model->email'");

    $verifyResult = password_verify($logInPassword, $model->password);

    header("location:" . "/login");
}
}