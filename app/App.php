<?php
namespace StudentList;

class App
{
    /**
     * @var array
     */
    private $dependencies = [];

    /**
     * Binds dependency using $dependencies array
     *
     * @param string $key
     * @param $value
     */
    public function bind($key, $value)
    {
        $this->dependencies[$key] = $value;
    }

    /**
     * Returns dependency from $dependencies array
     * Throws an exception if dependency is not found
     *
     * @param string $key
     *
     * @return mixed
     *
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