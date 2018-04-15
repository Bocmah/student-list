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


    abstract public function run();

    protected function render($file, array $params = [])
    {
        extract($params,EXTR_SKIP);
        return require_once "{$file}";
    }
}
