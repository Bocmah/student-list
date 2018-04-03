<?php
namespace StudentList\Controllers;

class ControllerFactory
{
    public static function makeController(string $controllerName, string $requestType)
    {
        $controller = null;

        switch ($controllerName)
        {
            case "HomeController":
                $controller = new HomeController($requestType);
                break;
            case "RegisterController":
                $controller = new RegisterController($requestType);
                break;
        }

        return $controller;
    }
}
