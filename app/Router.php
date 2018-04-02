<?php

namespace StudentList;

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
     * @return mixed
     * @throws \Exception
     */
    public function direct(string $uri)
    {
        if (array_key_exists($uri, $this->routes)) {
            return $this->routes[$uri];
        }

        throw new \Exception("No route defined for this URI.");
    }
}