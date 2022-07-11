<?php

namespace PHPMVC\lib;

class FrontController
{


    protected $_controller = "IndexController"  ;
    protected $_action  ="index" ;
    protected $_params = array();

    public function __Construct()
    {
        $this->_parseUrl();
        $this->dispatch();
    }
    public function _parseUrl()
    {
        $URL = explode("/",trim(parse_url($_SERVER['REQUEST_URI'],PHP_URL_PATH),"/"),3);


        if (isset($URL[0]) && $URL[0]!=""){
            $this->_controller = $URL[0];
        }

        if (isset($URL[1]) && $URL[1]!=""){
            $this->_action = $URL[1];
        }

        if (isset($URL[2]) && $URL[2]!=""){
            $this->_params = explode("/",$URL[2]);
        }
    }


    public function dispatch()
    {
        if (file_exists(APP_PATH.DS."controllers".DS.ucwords($this->_controller).".php")){
            require_once APP_PATH.DS."controllers".DS.ucwords($this->_controller).".php";
        }
        else{
            $this->_controller = "NotfoundController";
        }

        $controllerclassname = "PHPMVC\CONTROLLERS\\".ucwords($this->_controller);
        $obj = new $controllerclassname;
        $actionname = $this->_action;
        if (!method_exists($obj,$this->_action))
        {
            $actionname = "notfound";
        }
        call_user_func_array(array($obj,$actionname),$this->_params);
    }
}