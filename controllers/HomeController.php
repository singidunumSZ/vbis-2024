<?php

namespace app\controllers;
use app\core\BaseController;
use app\core\View;
class HomeController extends BaseController
{
    public function home(){

    $this->view->render('home', 'main');
    }
    public function about(){


        $this->view->render('home', 'main');
    }
}