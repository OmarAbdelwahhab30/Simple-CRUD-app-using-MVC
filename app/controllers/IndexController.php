<?php

namespace PHPMVC\controllers;

use PHPMVC\lib\AbstractController;

class IndexController extends AbstractController
{


    public function __Construct()
    {
        $this->ModelHelper = $this->Model("IndexModel");
    }
    public function index()
    {
        $data = $this->ModelHelper->GetAllEmployees();
        $this->Route("home",$data);
    }
}