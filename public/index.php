<?php
namespace PHPMVC;

session_start();
require_once realpath("../vendor/autoload.php");
use PHPMVC\lib\FrontController;
require_once "../app/config.php";

$front = new FrontController();