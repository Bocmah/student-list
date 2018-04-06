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
        // Check if user is logged in first
        if (!$this->authManager->checkIfIsAuthorized()) {
            // If he's not we redirect to the registration page
            header("Location: /register");
            die();
        }

        // Fetching student data from the database and preparing it for passing into view
        $studentData = $this->studentDataGateway->getStudentByHash($_COOKIE["hash"]);
        $params["values"] = $studentData;

        if ($this->action === "edit") {
            $this->render(__DIR__."/../../views/register.view.php", $params);
        } else {
            $this->render(__DIR__."/../../views/profile.view.php", $params);
        }
    }

    private function processPostRequest()
    {
        
    }

    private function render($file, $params = [])
    {
        extract($params,EXTR_SKIP);
        return require_once "{$file}";
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