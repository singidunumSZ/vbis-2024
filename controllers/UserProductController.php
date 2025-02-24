<?php

namespace app\controllers;

use app\core\Application;
use app\core\BaseController;
use app\models\ProductModel;
use app\models\UserModel;


class UserProductController extends BaseController
{

    public function productsForUsers()
    {

        $model = new ProductModel();

        $results = $model->all("");


        $this->view->render('productsForUsers', 'auth', $results);

    }






    public function accessRole(): array
    {
        return [];
    }





}

