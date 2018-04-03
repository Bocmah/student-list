<?php
namespace StudentList\Controllers;



class RegisterController extends BaseController
{
    public function __construct(string $requestType)
    {
        $this->requestType = $requestType;
    }

    private function processGet()
    {
        $this->render(__DIR__."/../../views/register.view.php");
    }

    private function processPost()
    {
        echo "Здарова!";
    }

    private function render($file)
    {
        require_once "{$file}";
    }

    public function run()
    {
        if ($this->requestType === "GET") {
            $this->processGet();
        } else {
            $this->processPost();
        }
    }
}

