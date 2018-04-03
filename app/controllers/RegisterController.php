<?php
namespace StudentList\Controllers;

use StudentList\Entities\Student;
use StudentList\Database\StudentDataGateway;
use StudentList\Validators\StudentValidator;


class RegisterController extends BaseController
{
    private $gateway;
    private $validator;

    public function __construct(string $requestType,
                                StudentDataGateway $gateway,
                                StudentValidator $validator)
    {
        $this->requestType = $requestType;
        $this->gateway = $gateway;
        $this->validator = $validator;
    }

    private function processGet()
    {
        $this->render(__DIR__."/../../views/register.view.php");
    }

    private function processPost()
    {

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

