<?php
use StudentList\Router;

require_once __DIR__."/../vendor/autoload.php";
require_once __DIR__."/../app/bootstrap.php";

Router::load(__DIR__."/../routes.php")->getController($app)->run();

