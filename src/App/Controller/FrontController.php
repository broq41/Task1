<?php

namespace App\Controller;


/**
 * Class FrontController
 * @package App\Controller
 */
class FrontController{


    const DEFAULT_CONTROLLER = "user";
    const DEFAULT_ACTION     = "login";

    private $controller;
    private $action;
    private $params;

    /**
     * FrontController constructor.
     * @param string $controller
     * @param string $action
     * @param array $params
     */
    public function __construct($controller = self::DEFAULT_CONTROLLER, $action = self::DEFAULT_ACTION, $params = [])
    {


        if(!$controller){
            $controller = self::DEFAULT_CONTROLLER;
        }

        if(!$action){
            $action = self::DEFAULT_ACTION;
        }

        $this->setController($controller);

        $this->setAction($action);

        $this->setParams($params);


    }

    private function setController($controller) {


        $controller = 'App\Controller\\' . ucfirst(strtolower($controller)) . 'Controller';

        $this->controller = new $controller;

        return $this;
    }

    private function setAction($action) {

        $this->action = $action;

        return $this;
    }

    private function setParams($params){

        $this->params = $params;

        return $this;
    }

    public function run() {


        call_user_func_array(array($this->controller, $this->action), $this->params);
    }

}