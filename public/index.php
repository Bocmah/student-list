<?php
use StudentList\Router;

require_once "../vendor/autoload.php";
require_once "../app/bootstrap.php";

$router = new Router();
$router->define(require_once "../routes.php");

var_dump($router);

