<?php
namespace StudentList\Controllers;

abstract class BaseController
{
    /**
     * @var string
     */
    protected $requestMethod;

    /**
     * @var string
     */
    protected $action;


    /**
     * The entry point of every controller
     */
    abstract public function run();

    /**
     * Renders the specific view passing $params
     *
     * @param $file
     * @param array $params
     * @return mixed
     */
    protected function render($file, array $params = [])
    {
        extract($params,EXTR_SKIP);
        return require_once "{$file}";
    }
}
