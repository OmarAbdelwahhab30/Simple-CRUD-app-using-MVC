<?php

namespace PHPMVC\lib;

class AbstractController
{
    public function Model($modelname)
    {
        require_once APP_PATH.DS."models".DS.$modelname.".php";
        $modelname = "PHPMVC\MODELS\\".$modelname;
        return new $modelname;
    }

    public function Route($view,$data = array())
    {
        if (file_exists(VIEW_PATH.DS.$view.".php")){
            require_once VIEW_PATH.DS.$view.".php";
        }else{
            require_once VIEW_PATH.DS.$view.".php";
        }
    }
}