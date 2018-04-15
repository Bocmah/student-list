<?php
namespace StudentList\Controllers;

use StudentList\Database\StudentDataGateway;
use StudentList\Helpers\Pager;
use StudentList\AuthManager;

class HomeController extends BaseController
{
    /**
     * @var Pager
     */
    private $pager;

    /**
     * @var StudentDataGateway
     */
    private $studentDataGateway;

    /**
     * @var AuthManager
     */
    private $authManager;

    /**
     * @var array
     */
    private $paginationInfo;

    /**
     * @var
     */
    private $notify;

    /**
     * HomeController constructor.
     * @param string $requestMethod
     * @param string $action
     * @param Pager $pager
     * @param StudentDataGateway $studentDataGateway
     * @param AuthManager $authManager
     */
    public function __construct(string $requestMethod,
                                string $action,
                                Pager $pager,
                                StudentDataGateway $studentDataGateway,
                                AuthManager $authManager)
    {
        $this->requestMethod = $requestMethod;
        $this->action = $action;
        $this->pager = $pager;
        $this->studentDataGateway = $studentDataGateway;
        $this->authManager = $authManager;
        $this->paginationInfo = $this->getPaginationInfo();
        $this->notify = isset($_GET["notify"]) ? $_GET["notify"] : null;
    }

    private function index()
    {
        if (isset($_GET["search"])) {
            $this->showSearchResults();
        } else {
            $this->showStudentsTable();
        }
    }

    /**
     * Returns an array of parameters required for implementing pagination
     *
     * @return array
     */
    private function getPaginationInfo(): array
    {
        $pagination["perPage"] = 10;
        $pagination["page"] = isset($_GET["page"]) ? intval($_GET["page"]) : 1;
        $pagination["offset"] = $this->pager->calculatePositioning(
            $pagination["page"],
            $pagination["perPage"]
        );
        $pagination["order"] = isset($_GET["order"]) ? strval($_GET["order"]) : "exam_score";
        $pagination["direction"] = isset($_GET["direction"]) ? strval($_GET["direction"]) : "DESC";

        return $pagination;
    }

    /**
     * Renders table containing all students
     */
    private function showStudentsTable()
    {
        $search = null;
        $order = $this->paginationInfo["order"];
        $direction = $this->paginationInfo["direction"];
        $page = $this->paginationInfo["page"];
        $notify = $this->notify;
        $students = $this->studentDataGateway->getStudents(
            $this->paginationInfo["offset"],
            $this->paginationInfo["perPage"],
            $order,
            $direction
        );
        $rowCount = $this->studentDataGateway->countTableRows();
        $totalPages = $this->pager->calculateTotalPages(
            $rowCount,
            $this->paginationInfo["perPage"]
        );

        $params = compact(
            "totalPages", "students", "order", "direction", "search", "page", "notify"
        );

        $this->render(__DIR__."/../../views/home.view.php",$params);
    }

    /**
     * Renders table containing search results
     */
    private function showSearchResults()
    {
        $search = $_GET["search"];
        $order = $this->paginationInfo["order"];
        $direction = $this->paginationInfo["direction"];
        $page = $this->paginationInfo["page"];
        $notify = $this->notify;
        $students = $this->studentDataGateway->searchStudents(
            $search,
            $this->paginationInfo["offset"],
            $this->paginationInfo["perPage"],
            $order,
            $direction
        );
        $rowCount = $this->studentDataGateway->countSearchRows($search);
        $totalPages = $this->pager->calculateTotalPages(
            $rowCount,
            $this->paginationInfo["perPage"]
        );

        $params = compact(
            "search", "order", "direction", "totalPages", "students", "page", "notify", "rowCount"
        );

        $this->render(__DIR__."/../../views/home.view.php",$params);
    }

    /**
     * Invokes controller's action based on $action property
     */
    public function run()
    {
      $action = $this->action;

      $this->$action();
    }
}
