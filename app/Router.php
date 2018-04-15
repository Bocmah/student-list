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

    public static function load($file)
    {
        $router = new static();

        require_once $file;

        return $router;
    }

    public function defineGet(string $uri, string $controller)
    {
        $this->routes["GET"][$uri] = $controller;
    }

    public function definePost(string $uri, string $controller)
    {
        $this->routes["POST"][$uri] = $controller;
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

        if (array_key_exists($uri, $this->routes[$requestMethod])) {
           list($controllerName, $action) = explode(
               "@",$this->routes[$requestMethod][$uri]
           );

           return ControllerFactory::makeController(
                         $requestMethod,
                         $controllerName,
                         $action,
                         $DIContainer
           );
        }

        throw new \Exception("No route defined for this URI.");
    }
}
