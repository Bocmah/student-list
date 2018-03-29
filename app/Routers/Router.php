<?php

namespace StudentList\Routers;

class Router
{
    private $routes = [];
    private static $instance;

    private function __construct()
    {
    }

    public static function getInstance()
    {
        if (empty(self::$instance)) {
            self::$instance = new Router();
        }
        return self::$instance;
    }

    public function define(array $routes)
    {
        $this->routes = $routes;
    }

    public function direct($uri)
    {
        if (array_key_exists($uri, $this->routes)) {
            return $this->routes[$uri];
        }

        throw new \Exception("No route defined for this URI.");
    }
}