<?php

namespace app\controllers;
use app\core\View;
class HomeController
{
    public View $view;

    public function __construct()
    {
        $this->view = new View();
    }
    public function home(){


    this->$view->render('home', 'main');
    }
    public function about(){


        this->$view->render('home', 'main');
    }
}