<?php
namespace StudentList\Controllers;

use StudentList\AuthManager;
use StudentList\Helpers\UrlManager;
use StudentList\Helpers\Util;
use StudentList\Database\StudentDataGateway;
use StudentList\Validators\StudentValidator;

class ProfileController extends BaseController
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
     * @var AuthManager
     */
    private $authManager;

    /**
     * @var Util
     */
    private $util;

    /**
     * @var UrlManager
     */
    private $urlManager;

    /**
     * ProfileController constructor.
     * @param string $requestMethod
     * @param string $action
     * @param StudentDataGateway $studentDataGateway
     * @param StudentValidator $studentValidator
     * @param AuthManager $authManager
     * @param Util $util
     * @param UrlManager $urlManager
     */
    public function __construct(string $requestMethod,
                                string $action,
                                StudentDataGateway $studentDataGateway,
                                StudentValidator $studentValidator,
                                AuthManager $authManager,
                                Util $util,
                                UrlManager $urlManager)
    {
        $this->requestMethod = $requestMethod;
        $this->action = $action;
        $this->gateway = $studentDataGateway;
        $this->validator = $studentValidator;
        $this->authManager = $authManager;
        $this->urlManager = $urlManager;
        $this->util = $util;
    }

    /**
     * Index action.
     * Showing student's profile
     *
     * @return void
     */
    private function index(): void
    {
        $this->showProfile();
    }

    /**
     * ShowEdit action.
     * Showing editing form
     *
     * @return void
     */
    private function showEdit(): void
    {
        $studentData = $this->gateway->getStudentByHash($_COOKIE["hash"]);
        $params["values"] = $studentData;

        $this->render(__DIR__."/../../views/register.view.php", $params);
    }

    /**
     * Store action.
     * Updates student if fields are validated. Re-renders editing form otherwise
     *
     * @return void
     */
    private function store(): void
    {
        $values = $this->grabPostValues();
        $student = $this->util->createStudent($values);
        $errors = $this->validator->validateAllFields($student);
        $student->setHash($_COOKIE["hash"]);

        if (empty($errors)) {
            $this->gateway->updateStudent($student);
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
    private function grabPostValues(): array
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
     * Renders the profile page
     *
     * @return void
     */
    private function showProfile(): void
    {
        $studentData = $this->gateway->getStudentByHash($_COOKIE["hash"]);
        $params["values"] = $studentData;

        $this->render(__DIR__."/../../views/profile.view.php", $params);
    }

    /**
     * Redirecting to /register if user is not authorized
     * Invokes controller's action based on $action property
     *
     * @return void
     */
    public function run(): void
    {
        if (!$this->authManager->checkIfAuthorized()) {
            $this->urlManager->redirect("/register");
        }

        $action = $this->action;

        $this->$action();
    }
}