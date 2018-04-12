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
}
