<?php

namespace app\controllers;
use app\core\BaseController;
use app\core\View;
use app\models\UserCartModel;

class HomeController extends BaseController
{
    public function home(){

        $model = new UserCartModel();
        $results = $model->getCartData();

    $this->view->render('home', 'main', $results);
    }
    public function about(){


        $this->view->render('home', 'main', null);
    }


        public function accessRole(): array
    {
        return [];
    }

}