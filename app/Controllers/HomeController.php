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
     * @var int|null
     */
    private $notify;

    /**
     * @var bool
     */
    private $isAuth;

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
        $this->isAuth = $this->authManager->checkIfAuthorized();
        $this->paginationInfo = $this->getPaginationInfo();
        $this->notify = isset($_GET["notify"]) ? intval($_GET["notify"]) : null;
    }

    /**
     * Index action.
     *
     * @return void
     */
    private function index(): void
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
        $pagination["paginationLinks"] = 5;
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
     * Returns an array containing amount of links to be rendered, starting and ending points of pagination
     *
     * @param string|null $search
     *
     * @return array
     */
    private function calculatePaginationParams(string $search = null): array
    {
        $paginationParams = [];

        // Calculates the amount of search rows if $search query is provided.
        // Calculates all table rows otherwise
        if ($search) {
            $rowCount = $this->studentDataGateway->countSearchRows($search);
        } else {
            $rowCount = $this->studentDataGateway->countTableRows();
        }

        $paginationParams["totalPages"] = $this->pager->calculateTotalPages(
            $rowCount,
            $this->paginationInfo["perPage"]
        );
        $paginationParams["start"] = $this->pager->calculateStartingPoint(
            $this->paginationInfo["page"],
            $this->paginationInfo["paginationLinks"]
        );
        $paginationParams["end"] = $this->pager->calculateEndingPoint(
            $this->paginationInfo["page"],
            $paginationParams["totalPages"],
            $this->paginationInfo["paginationLinks"]
        );

        return $paginationParams;
    }

    /**
     * Renders table containing all students
     *
     * @return void
     */
    private function showStudentsTable(): void
    {
        $search = null;
        $order = $this->paginationInfo["order"];
        $direction = $this->paginationInfo["direction"];
        $page = $this->paginationInfo["page"];
        $notify = $this->notify;
        $isAuth = $this->isAuth;
        $students = $this->studentDataGateway->getStudents(
            $this->paginationInfo["offset"],
            $this->paginationInfo["perPage"],
            $order,
            $direction
        );
        ["totalPages" => $totalPages, "start" => $start, "end" => $end] =
            $this->calculatePaginationParams();

        $params = compact(
            "totalPages",
            "start",
            "end",
            "students",
            "order",
            "direction",
            "search",
            "page",
            "notify",
            "isAuth"
        );

        $this->render(__DIR__."/../../views/home.view.php",$params);
    }

    /**
     * Renders table containing search results
     *
     * @return void
     */
    private function showSearchResults(): void
    {
        $search = $_GET["search"];
        $order = $this->paginationInfo["order"];
        $direction = $this->paginationInfo["direction"];
        $page = $this->paginationInfo["page"];
        $notify = $this->notify;
        $isAuth = $this->isAuth;
        $students = $this->studentDataGateway->searchStudents(
            $search,
            $this->paginationInfo["offset"],
            $this->paginationInfo["perPage"],
            $order,
            $direction
        );
        ["totalPages" => $totalPages, "start" => $start, "end" => $end] =
            $this->calculatePaginationParams($search);

        $params = compact(
            "search",
            "order",
            "direction",
            "totalPages",
            "start",
            "end",
            "students",
            "page",
            "notify",
            "isAuth"
        );

        $this->render(__DIR__."/../../views/home.view.php",$params);
    }

    /**
     * Invokes controller's action based on $action property
     *
     * @return void
     */
    public function run(): void
    {
      $action = $this->action;

      $this->$action();
    }
}
