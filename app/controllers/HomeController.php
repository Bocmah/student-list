<?php
namespace StudentList\Controllers;

class HomeController extends BaseController
{
    public function __construct(string $requestType)
    {
        $this->requestType = $requestType;
    }

    public function run()
    {

    }
}
