<?php
namespace StudentList\Controllers;

use StudentList\AuthManager;
use StudentList\Entities\Student;
use StudentList\Database\StudentDataGateway;
use StudentList\Validators\StudentValidator;
use StudentList\Helpers\{Util, UrlManager};


class RegisterController extends BaseController
{
    /**
     * @var StudentDataGateway
     */
    private $gateway;

    /**
     * @var StudentValidator
     */
    private $validator;

    /**
     * @var Util
     */
    private $util;

    /**
     * @var AuthManager
     */
    private $authManager;

    /**
     * @var UrlManager
     */
    private $urlManager;

    /**
     * RegisterController constructor.
     * @param string $requestMethod
     * @param string $action
     * @param StudentDataGateway $gateway
     * @param StudentValidator $validator
     * @param Util $util
     * @param AuthManager $authManager
     * @param UrlManager $urlManager
     */
    public function __construct(string $requestMethod,
                                string $action,
                                StudentDataGateway $gateway,
                                StudentValidator $validator,
                                Util $util,
                                AuthManager $authManager,
                                UrlManager $urlManager)
    {
        $this->requestMethod = $requestMethod;
        $this->action = $action;
        $this->gateway = $gateway;
        $this->validator = $validator;
        $this->util = $util;
        $this->authManager = $authManager;
        $this->urlManager = $urlManager;
    }

    /**
     * Index action.
     * Renders registration form
     *
     * @return void
     */
    private function index(): void
    {
        $this->render(__DIR__."/../../views/register.view.php");
    }

    /**
     * Store action.
     * Storing new student in the database
     *
     * @return void
     */
    private function store(): void
    {
        $values = $this->grabPostValues();
        $student = $this->util->createStudent($values);
        $errors = $this->validator->validateAllFields($student);

        if (empty($errors)) {
            $hash = $this->util->generateHash();
            $student->setHash($hash);
            $this->gateway->insertStudent($student);
            $this->authManager->logIn($hash);
            $this->urlManager->redirect("/?notify=1");
        } else {
            // Re-render the form passing $errors and $values arrays
            $params = compact("values", "errors");
            $this->render(__DIR__."/../../views/register.view.php", $params);
        }
    }

    /**
     * Returns an array of sanitized $_POST values
     *
     * @return array
     */
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


    /**
     * Redirecting to /profile if user is not authorized
     * Invokes controller's action based on $action property
     *
     * @return void
     */
    public function run(): void
    {
        // Checking if user is not logged in first
        if ($this->authManager->checkIfAuthorized()) {
            // If he is redirecting to the profile page
            $this->urlManager->redirect("/profile");
        }

        $action = $this->action;

        $this->$action();
    }
}

