<?php
namespace app\controllers;

use app\core\View;

class UserController
{
    public function userCreate()
    {
        return "User Created";
    }

    public function readUser()
    {
        $view = new View();
        echo $view->render('getUser', 'main');

    }
}