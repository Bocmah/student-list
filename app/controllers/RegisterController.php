<?php
namespace StudentList\Controllers;

use StudentList\AuthManager;
use StudentList\Entities\Student;
use StudentList\Database\StudentDataGateway;
use StudentList\Validators\StudentValidator;
use StudentList\Helpers\Util;


class RegisterController extends BaseController
{
    private $gateway;
    private $validator;
    private $util;
    private $authManager;

    public function __construct(string $requestType,
                                StudentDataGateway $gateway,
                                StudentValidator $validator,
                                Util $util,
                                AuthManager $authManager)
    {
        $this->requestType = $requestType;
        $this->gateway = $gateway;
        $this->validator = $validator;
        $this->util = $util;
        $this->authManager = $authManager;
    }

    private function processGetRequest()
    {
        $params["formAction"] = "register";
        $this->render(__DIR__."/../../views/register.view.php", $params);
    }

    private function processPostRequest()
    {
        $values = $this->grabPostValues();
        $student = $this->createStudent($values);
        $errors = $this->validator->validateAllFields($student);

        if (empty($errors)) {
            $hash = $this->util->generateHash();
            $student->setHash($hash);
            $this->gateway->insertStudent($student);
            $this->authManager->logIn($hash);
            header("Location: /");
            die();
        } else {
            // Re-render the form passing $errors and $values arrays
            $params["values"] = $values;
            $params["errors"] = $errors;
            $this->render(__DIR__."/../../views/register.view.php", $params);
        }

    }

    private function createStudent(array $values)
    {
        $student = new Student(
            $values["name"],
            $values["surname"],
            $values["group_number"],
            $values["email"],
            $values["exam_score"],
            $values["birth_year"],
            $values["gender"],
            $values["residence"]
        );

        return $student;
    }

    private function grabPostValues()
    {
        $values = [];

        $values["name"] = array_key_exists("name", $_POST) ?
            strval(trim($_POST["name"])) :
            "";
        $values["surname"] = array_key_exists("surname", $_POST) ?
            strval(trim($_POST["surname"])) :
            "";
        $values["birth_year"] = array_key_exists("birth_year", $_POST) ?
            intval($_POST["birth_year"]) :
            0;
        $values["gender"] = array_key_exists("gender", $_POST) ?
            strval($_POST["gender"]) :
            "";
        $values["group_number"] = array_key_exists("group_number", $_POST) ?
            strval(trim($_POST["group_number"])) :
            "";
        $values["exam_score"] = array_key_exists("exam_score", $_POST) ?
            intval($_POST["exam_score"]) :
            0;
        $values["email"] = array_key_exists("email", $_POST) ?
            strval(trim($_POST["email"])) :
            "";
        $values["residence"] = array_key_exists("residence", $_POST) ?
            strval($_POST["residence"]) :
            "";

        return $values;
    }

    private function render($file, $params = [])
    {
        extract($params,EXTR_SKIP);
        return require_once "{$file}";
    }

    public function run()
    {
        // Check if user is not logged in first
        if ($this->authManager->checkIfAuthorized()) {
            // If he is we redirect to the profile page
            header("Location: /profile");
            die();
        }

        if ($this->requestType === "GET") {
            $this->processGetRequest();
        } else {
            $this->processPostRequest();
        }
    }
}

