<?php

require_once __DIR__ . "/../vendor/autoload.php";

use app\controllers\AdminReportController;
use app\controllers\CartController;
use app\controllers\HomeController;
use app\controllers\ProductController;
use app\controllers\UserController;
use app\controllers\AuthController;

use app\controllers\UserProductController;
use app\controllers\UserReportController;
use app\core\Application;


$app = new Application();


$app->router->get("/getUser", [UserController::class, 'readUser']);
$app->router->get("/", [HomeController::class, 'home']);
$app->router->get("/users", [UserController::class, 'readAll']);
$app->router->get("/updateUser", [UserController::class, 'updateUser']);
$app->router->post("/processUpdateUser", [UserController::class, 'processUpdateUser']);
$app->router->get("/updateProduct", [ProductController::class, 'update']);
$app->router->post("/processUpdateProduct", [ProductController::class, 'processUpdate']);
$app->router->get("/products", [ProductController::class, 'products']);
$app->router->get("/productsForUsers", [UserProductController::class, 'productsForUsers']);

$app->router->get("/createUser", [UserController::class, 'createUser']);
$app->router->post("/processCreateUser", [UserController::class, 'processCreate']);
$app->router->get("/registration", [AuthController::class, 'registration']);
$app->router->post("/processRegistration", [AuthController::class, 'processRegistration']);
$app->router->get("/login", [AuthController::class, 'login']);
$app->router->post("/processLogIn", [AuthController::class, 'processLogIn']);
$app->router->get("/processLogout", [AuthController::class, 'processLogout']);
$app->router->get("/accessDenied", [AuthController::class, 'accessDenied']);
$app->router->get("/createProduct", [ProductController::class, 'createProduct']);
$app->router->post("/processCreateProduct", [ProductController::class, 'processCreateProduct']);
$app->router->post("/processCart", [CartController::class, 'processCart']);

$app->router->get("/myReports", [UserReportController::class, 'myReports']);
$app->router->get("/adminReports", [AdminReportController::class, 'adminReports']);

$app->router->get("/getNumberOfPurchasesPerMonth", [UserReportController::class, 'getNumberOfPurchasesPerMonth']);
$app->router->get("/getPricePerMonth", [UserReportController::class, 'getPricePerMonth']);
$app->router->get("/getPricePerUser", [AdminReportController::class, 'getPricePerUser']);
$app->router->get("/getNumberOfPurchasesS", [AdminReportController::class, 'getNumberOfPurchasesS']);
$app->router->get("/getNumberOfPurchasesM", [AdminReportController::class, 'getNumberOfPurchasesM']);
$app->router->get("/getNumberOfPurchasesL", [AdminReportController::class, 'getNumberOfPurchasesL']);
















$app->run();