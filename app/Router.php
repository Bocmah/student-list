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
     * @param string $uri
     * @param string $requestType
     * @return null|Controllers\HomeController|Controllers\RegisterController
     * @throws \Exception
     */
    public function getController(string $uri, string $requestType, App $DIContainer)
    {
        if (array_key_exists($uri, $this->routes)) {
           $controllerName =  $this->routes[$uri];
           $controller = ControllerFactory::makeController(
                         $controllerName,
                           $requestType,
                         $DIContainer
           );

           return $controller;
        }

        throw new \Exception("No route defined for this URI.");
    }
}
