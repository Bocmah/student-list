<?php
namespace StudentList\Controllers;

use StudentList\App;

class ControllerFactory
{
    /**
     * @param string $controllerName
     * @param string $requestMethod
     * @param string $action
     * @param App $DIContainer
     * @return null|HomeController|ProfileController|RegisterController
     */
    public static function makeController(string $controllerName,
                                          string $requestMethod,
                                          string $action,
                                          App $DIContainer)
    {
        $controller = null;

        switch ($controllerName)
        {
            case "HomeController":
                $controller = new HomeController(
                    $requestMethod,
                    $DIContainer->get("pager"),
                    $DIContainer->get("studentDataGateway")
                );
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
