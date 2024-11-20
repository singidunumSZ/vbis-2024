<?php

namespace app\controllers;

use app\core\Application;
use app\core\BaseController;
use app\models\AuthModel;
use app\models\ProductModel;
use app\models\RoleModel;
use app\models\SessionUserModel;
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
            Application::$app->session->set('errorNotification', 'Neuspesna registracija!');

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
        Application::$app->session->set('successNotification', 'Uspesno ste se registrovali!');




        header("location:" . "/login");
    }


public function login(){
    if(Application::$app->session->get('user')){
        header("location:" . "/");
    }
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
    if($verifyResult){
        $sessionUserModel = new SessionUserModel();
        $sessionUserModel->email = $model->email;



        Application::$app->session->set('user', $sessionUserModel->getSessionData());

        header("location:" . "/");
        Application::$app->session->set('successNotification', 'Uspesno ste se ulogovali!');

    }
    $model->password = $logInPassword;
    Application::$app->session->set('errorNotification', 'Neuspesan pokusaj prijave!');
    $this->view->render('login','auth', $model);



}

public function processLogout(){
    Application::$app->session->delete('user');
    header("location:" . "/login");


}

    public function accessDenied(){

        $this->view->render('accessDenied','auth', null);


    }

    public function accessRole(): array
    {
       return [];
    }
}