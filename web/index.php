<?php

use App\Controller\FrontController;

ini_set('session.use_strict_mode', 1);
session_start();

require_once($_SERVER['DOCUMENT_ROOT'] . '/../src/App/Manager/autoloader.php');
require_once($_SERVER['DOCUMENT_ROOT'] . '/../src/App/Manager/sessions.php');


id_prevent_adoption();
id_regeneration();

$requestedPage = null;
$requestedAction = null;
$requestedParams = [];

if (!empty($_GET['page'])) {

    $requestedPage = strip_tags($_GET['page']);
}

if (!empty($_GET['action'])) {

    $requestedAction = strip_tags($_GET['action']);
}

if (!empty($_GET['params'])) {

    if(is_array($_GET['params'])){

        foreach($_GET['params'] as $key => $requestedParam){

            $requestedParams[$key] = strip_tags($requestedParam);
        }

    }else{
        $requestedParams[] = strip_tags($_GET['params']);
    }
}

if (!isset($_SESSION['email']) && $requestedAction!== 'login' && $requestedPage !== 'user') {

    $requestedPage = 'user';
    $requestedAction = 'login';

}



$frontController = new FrontController($requestedPage, $requestedAction, $requestedParams);

$frontController->run();

