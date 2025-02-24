<?php

namespace app\controllers;

use app\core\Application;
use app\core\BaseController;
use app\models\CartModel;
use app\models\ProductModel;

class CartController extends BaseController
{

    public function processCart()
    {
        $model = new CartModel();
        $model2 = new CartModel();
        $model->mapData($_POST);
        $model2->mapData($_POST);

        $model->one("where size = '$model->size' and id_products = $model->id_products");
        $model2->one("where shop_time = '$model->shop_time' and id_products = $model->id_products");
        if (isset($model->id) ) {
            Application::$app->session->set('errorNotification', 'Proizvod nije na stanju!');
            header("location:" . "/productsForUsers");

        }

        else{$sessions = Application::$app->session->get('user');

            if (isset($model2->id)) {
                Application::$app->session->set('errorNotification', 'Vec postoji zakazani termin za izabrani datum!');
                header("location:" . "/productsForUsers");
                exit;
            }

            if ($model2->shop_time == '') {
                Application::$app->session->set('errorNotification', 'Morate izabrati datum i vreme termina za rezervaciju!');
                header("location:" . "/productsForUsers");
                exit;
            }


            if($model->size == ''){
                Application::$app->session->set('errorNotification', 'Morate odabrati zeljenu velicinu!');
                header("location:" . "/productsForUsers");
                exit;
            }

            $sessions1 = Application::$app->session->get('user');

            foreach ($sessions1 as $session1) {
                $model2->id_user = $session1['id_user'];
            }

            $productModel = new ProductModel();
            $productModel->one("where id = '$model2->id_products'");



            header("location:" . "/");


        foreach($sessions as $session){
            $model->id_user = $session['id_user'];

        }


        $model->insert();
        Application::$app->session->set('successNotification' , 'Uspesno ste dodali proizvod u korpu!');

        header("location:"."/");



    }

    }

    public function accessRole(): array
    {
       return ['korisnik', 'administrator'];
    }
}