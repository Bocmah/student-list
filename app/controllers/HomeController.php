<?php
namespace StudentList\Controllers;

class HomeController extends BaseController
{
    public function __construct(string $requestMethod)
    {
        $this->requestMethod = $requestMethod;
    }

    private function processGetRequest()
    {

    }

    public function run()
    {
      if ($this->requestMethod === "GET") {
          $this->processGetRequest();
      }
    }
}
