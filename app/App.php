<?php
namespace StudentList;

class App
{
    private static $instance;
    private $dependencies = [];

    private function __construct()
    {
    }

    /**
     * @return App
     */
    public static function getInstance(): App
    {
        if (empty(self::$instance)) {
            self::$instance = new App();
        }
        return self::$instance;
    }

    /**
     * @param $key
     * @param $value
     */
    public function bind($key, $value)
    {
        $this->dependencies[$key] = $value;
    }

    /**
     * @param string $key
     * @return mixed
     * @throws \Exception
     */
    public function get(string $key)
    {
        if (!array_key_exists($key, $this->dependencies)) {
            throw new \Exception("No {$key} found in the container");
        }

        return $this->dependencies[$key];
    }
}