<?php
namespace StudentList\Controllers;

abstract class BaseController
{
    protected $requestType;

    abstract public function run();
}