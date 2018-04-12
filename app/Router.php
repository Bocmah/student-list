<?php

namespace StudentList;

use StudentList\Controllers\ControllerFactory;

class Router
{
    private $routes = [];

    /**
     * Defines legit routes
     *
     * @param array $routes
     */
    public function define(array $routes)
    {
        $this->routes = $routes;
    }

    /**
     * Invokes ControllerFactory in order to return required controller to handle the request
     *
     * @param App $DIContainer
     *
     * @return null|Controllers\HomeController|Controllers\RegisterController
     *
     * @throws \Exception
     */
    public function getController(App $DIContainer)
    {
        $uri = $DIContainer->get("urlManager")->getUri();
        $requestMethod = $DIContainer->get("urlManager")->getRequestMethod();

        if (array_key_exists($uri[0], $this->routes)) {
           $controllerName =  $this->routes[$uri[0]];
           $action = array_key_exists(1, $uri) ? $uri[1] : "/";
           $controller = ControllerFactory::makeController(
                         $controllerName,
                           $requestMethod,
                         $action,
                         $DIContainer
           );

           return $controller;
        }

        throw new \Exception("No route defined for this URI.");
    }
}
