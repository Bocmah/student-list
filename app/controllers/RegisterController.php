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

    private function processGetRequest()
    {
        $this->render(__DIR__."/../../views/register.view.php");
    }

    private function processPostRequest()
    {
        $values = $this->grabPostValues();
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
        $errors = $this->validator->validateAllFields($student);

        if (empty($errors)) {
            $this->gateway->insertStudent($student);
            echo "Успех!";
        } else {
            echo "Что-то пошло не так...";
            echo "<br><br>";
            var_dump($errors);
        }

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

    private function render($file)
    {
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

