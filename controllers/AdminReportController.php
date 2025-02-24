<?php

namespace app\controllers;

use app\core\BaseController;

use app\models\ReportModel;

class AdminReportController extends BaseController
{
    public function adminReports()
    {
        $this->view->render('adminReports', 'main', null);
    }

    public function getPricePerUser()
    {
        $model = new ReportModel();
        $model->mapData($_GET);
        $model->getPricePerUser();
    }

    public function getNumberOfPurchasesS(){
        $model = new ReportModel();
        $model->mapData($_GET);
        $model->getNumberOfPurchasesS();
    }
    public function getNumberOfPurchasesM(){
        $model = new ReportModel();
        $model->mapData($_GET);
        $model->getNumberOfPurchasesM();
    }
    public function getNumberOfPurchasesL(){
        $model = new ReportModel();
        $model->mapData($_GET);
        $model->getNumberOfPurchasesL();
    }


    public function accessRole() : array
    {
        return['administrator'];
    }
}