<?php
namespace app\controllers;

use app\core\View;

class UserController extends BaseController
{
    public function userCreate()
    {
        return "User Created";
    }

    public function readUser()
    {

        this->view->render('getUser', 'main');

    }
}