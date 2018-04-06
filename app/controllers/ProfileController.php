<?php
namespace StudentList\Controllers;

use StudentList\AuthManager;
use StudentList\Database\StudentDataGateway;

class ProfileController extends BaseController
{
    private $studentDataGateway;
    private $authManager;

    public function __construct(string $requestType,
                                string $action,
                                StudentDataGateway $studentDataGateway,
                                AuthManager $authManager)
    {
        $this->requestType = $requestType;
        $this->action = $action;
        $this->studentDataGateway = $studentDataGateway;
        $this->authManager = $authManager;
    }

    private function processGetRequest()
    {
        if ($this->action === "edit") {
            echo "Here we'll be editing";
        } else {
            echo "Here will be the profile";
        }
    }

    private function processPostRequest()
    {

    }

    public function run()
    {
        if ($this->requestType === "GET") {
            $this->processGetRequest();
        } else {
            $this->processPostRequest();
        }
    }
}