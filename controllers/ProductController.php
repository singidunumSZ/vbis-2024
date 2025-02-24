<?php

namespace app\controllers;

use app\core\Application;
use app\core\BaseController;
use app\models\ProductModel;
use app\models\UserModel;


class ProductController extends BaseController
{
    public function products()
    {

        $model = new ProductModel();

        $results = $model->all("");//koristis all metodu ne products iz ProductMOdel


        $this->view->render('products', 'main', $results);

    }
    public function productsForUsers()
    {

        $model = new ProductModel();

        $results = $model->all("");


        $this->view->render('productsForUsers', 'auth', $results);

    }
    public function update()
    {

        $model = new ProductModel();
        $model->mapData($_GET);


        $model->one("where id = $model->id");


        $this->view->render('updateProduct', 'main', $model);

    }

    public function processUpdate()
    {

        $model = new ProductModel();
        $model->mapData($_POST);
        $model->validate();

        if ($model->errors) {
            Application::$app->session->set('errorNotification', 'Neuspesna promena!');

            $this->view->render('updateProduct', 'main', $model);
            exit;
        }
        $target_dir = __DIR__ . "/../public/assets/uploads/";
        $original_file_name = basename($_FILES["file"]["name"]);
        $file_extension = strtolower(pathinfo($original_file_name, PATHINFO_EXTENSION));
        $new_file_name = uniqid() . '.' . $file_extension;
        $target_file = $target_dir . $new_file_name;

        if (file_exists($target_file)) {
            Application::$app->session->set('errorNotification', 'File already exists!');
            $this->view->render('updateProduct', 'main', $model);
            exit;
        }

        if ($_FILES["file"]["size"] > 5000000) {
            Application::$app->session->set('errorNotification', 'File is too large!');
            $this->view->render('updateProduct', 'main', $model);
            exit;
        }

        if ($file_extension != "jpg" && $file_extension != "png" && $file_extension != "jpeg") {
            Application::$app->session->set('errorNotification', 'File format is not allowed!');
            $this->view->render('updateProduct', 'main', $model);
            exit;
        }

        if (!move_uploaded_file($_FILES["file"]["tmp_name"], $target_file)) {
            Application::$app->session->set('errorNotification', 'Failed upload!');
            $this->view->render('createProduct', 'main', $model);
            exit;
        }

        $model->image_name = $new_file_name;


        $model->update("where id = $model->id");
        Application::$app->session->set('successNotification', 'Uspesno promenjen proizvod!');


        header("location:" . "/products");

    }

    public function accessRole(): array
    {
        return ['administrator'];
    }

    public function createProduct()
    {


        $model = new ProductModel();


        $this->view->render('createProduct', 'main', $model);

    }


    public function processCreateProduct()
    {

        $model = new ProductModel();
        $model->mapData($_POST);

        $model->validate();
        if ($model->errors) {
            Application::$app->session->set('errorNotification', 'Neuspesno kreiranje proizvoda!');

            $this->view->render('createProduct', 'main', $model);
            exit;
        }

        $target_dir = __DIR__ . "/../public/assets/uploads/";
        $original_file_name = basename($_FILES["file"]["name"]);
        $file_extension = strtolower(pathinfo($original_file_name, PATHINFO_EXTENSION));
        $new_file_name = uniqid() . '.' . $file_extension;
        $target_file = $target_dir . $new_file_name;

        if (file_exists($target_file)) {
            Application::$app->session->set('errorNotification', 'File already exists!');
            $this->view->render('createProduct', 'main', $model);
            exit;
        }

        if ($_FILES["file"]["size"] > 5000000) {
            Application::$app->session->set('errorNotification', 'File is too large!');
            $this->view->render('createProduct', 'main', $model);
            exit;
        }

        if ($file_extension != "jpg" && $file_extension != "png" && $file_extension != "jpeg") {
            Application::$app->session->set('errorNotification', 'File format is not allowed!');
            $this->view->render('createProduct', 'main', $model);
            exit;
        }

        if (!move_uploaded_file($_FILES["file"]["tmp_name"], $target_file)) {
            Application::$app->session->set('errorNotification', 'Failed upload!');
            $this->view->render('createProduct', 'main', $model);
            exit;
        }

        $model->image_name = $new_file_name;



        $model->insert();
        Application::$app->session->set('successNotification', 'Uspesno kreiranje proizvoda!');

        header("location:" . "/products");

    }
}

