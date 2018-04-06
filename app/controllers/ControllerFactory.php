<?php
namespace StudentList\Controllers;

use StudentList\App;

class ControllerFactory
{
    public static function makeController(string $controllerName,
                                          string $requestType,
                                          string $action,
                                          App $DIContainer)
    {
        $controller = null;

        switch ($controllerName)
        {
            case "HomeController":
                $controller = new HomeController($requestType);
                break;
            case "RegisterController":
                $controller = new RegisterController(
                    $requestType,
                    $DIContainer->get("studentDataGateway"),
                    $DIContainer->get("studentValidator"),
                    $DIContainer->get("util"),
                    $DIContainer->get("authManager")
                );
                break;
            case "ProfileController":
                $controller = new ProfileController($requestType,$action);
                break;
        }

        return $controller;
    }
}
