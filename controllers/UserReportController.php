<?php

namespace app\controllers;

use app\core\BaseController;
use app\models\ReportModel;

class UserReportController extends BaseController
{
public function myReports(){
    $this->view->render('myReports','main',null);
}
public function getNumberOfPurchasesPerMonth(){
$model = new ReportModel();
 $model->getNumberOfPurchasesPerMonth();
}
public function getPricePerMonth(){
    $model = new ReportModel();
    $model->getPricePerMonth();
}
    public function accessRole() : array
    {
        return['administrator' , 'korisnik'];
    }
}