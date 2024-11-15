<?php

namespace app\controllers;

use app\core\BaseController;
use app\models\ProductModel;
use app\models\UserModel;

class ProductController extends BaseController
{
    public function readAllProducts()
    {

        $model = new ProductModel();

        $results = $model->all("");


        $this->view->render('products', 'main', $results);

    }
    public function updateProduct()
    {

        $model = new ProductModel();
        $model->mapData($_GET);
        $model->one("where id = $model->id");


        $this->view->render('updateProduct', 'main', $model);

    }
    public function processUpdateProduct()
    {

        $model = new ProductModel();
        $model->mapData($_POST);



        $model->update("where id = $model->id");

        header("location:" . "/products");

    }
}