<?php

namespace StudentList;

use StudentList\Controllers\ControllerFactory;

class Router
{
    private $routes = [];

    /**
     * @param array $routes
     */
    public function define(array $routes)
    {
        $this->routes = $routes;
    }

    /**
     * @param array $uri
     * @param string $requestType
     * @return null|Controllers\HomeController|Controllers\RegisterController
     * @throws \Exception
     */
    public function getController(array $uri, string $requestType, App $DIContainer)
    {
        if (array_key_exists($uri[0], $this->routes)) {
           $controllerName =  $this->routes[$uri[0]];
           $action = array_key_exists(1, $uri) ? $uri[1] : "/";
           $controller = ControllerFactory::makeController(
                         $controllerName,
                           $requestType,
                         $action,
                         $DIContainer
           );

           return $controller;
        }

        throw new \Exception("No route defined for this URI.");
    }
}
