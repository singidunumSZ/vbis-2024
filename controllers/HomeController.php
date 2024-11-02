<?php

namespace app\controllers;
use app\core\View;
class HomeController
{
    public function home(){
    $view = new View();
    echo $view->render('home');
    }
}