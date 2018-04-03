<?php
use StudentList\Router;
use StudentList\Helpers\UrlManager;

require_once "../vendor/autoload.php";
require_once "../app/bootstrap.php";

$urlManager = new UrlManager();
$router = new Router();
$router->define(require_once "../routes.php");
$controller = $router->getController(
    $urlManager->getUri(),
    $urlManager->getRequestMethod()
);
$controller->run();
