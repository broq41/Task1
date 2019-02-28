<?php
namespace App\Controller;


abstract class BaseController {

    protected function render($slug, $data = []){

        include($_SERVER['DOCUMENT_ROOT'] . '/../src/App/View/' . $slug . '.php');
        die();

    }

    function redirect($url) {

        ob_start();

        header('Location: '.$url);

        ob_end_flush();
        die();
    }

}