<?php
namespace StudentList;

class App
{
    private $dependencies = [];

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