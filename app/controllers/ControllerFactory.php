<?php
namespace StudentList\Controllers;

use StudentList\App;

class ControllerFactory
{
    public static function makeController(string $controllerName,
                                          string $requestMethod,
                                          string $action,
                                          App $DIContainer)
    {
        $controller = null;

        switch ($controllerName)
        {
            case "HomeController":
                $controller = new HomeController($requestMethod);
                break;
            case "RegisterController":
                $controller = new RegisterController(
                    $requestMethod,
                    $DIContainer->get("studentDataGateway"),
                    $DIContainer->get("studentValidator"),
                    $DIContainer->get("util"),
                    $DIContainer->get("authManager"),
                    $DIContainer->get("urlManager")
                );
                break;
            case "ProfileController":
                $controller = new ProfileController(
                    $requestMethod,
                    $action,
                    $DIContainer->get("studentDataGateway"),
                    $DIContainer->get("studentValidator"),
                    $DIContainer->get("authManager"),
                    $DIContainer->get("util"),
                    $DIContainer->get("urlManager")
                );
                break;
        }

        return $controller;
    }
}
