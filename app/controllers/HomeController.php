<?php
namespace StudentList\Controllers;

use StudentList\Database\StudentDataGateway;
use StudentList\Helpers\Pager;

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
     * HomeController constructor.
     * @param string $requestMethod
     * @param Pager $pager
     * @param StudentDataGateway $studentDataGateway
     */
    public function __construct(string $requestMethod,
                                Pager $pager,
                                StudentDataGateway $studentDataGateway)
    {
        $this->requestMethod = $requestMethod;
        $this->pager = $pager;
        $this->studentDataGateway = $studentDataGateway;
    }
    
    private function processGetRequest()
    {
        $pagination = $this->getPaginationInfo();
        $order = $pagination["order"];
        $direction = $pagination["direction"];
        $page = $pagination["page"];
        $notify = isset($_GET["notify"]) ? $_GET["notify"] : null;

        if (!isset($_GET["search"])) {
            $search = null;
            $students = $this->studentDataGateway->getStudents(
                    $pagination["offset"],
                    $pagination["perPage"],
                    $pagination["order"],
                    $pagination["direction"]
            );
            $rowCount = $this->studentDataGateway->countTableRows();
            $totalPages = $this->pager->calculateTotalPages($rowCount, $pagination["perPage"]);

            $params = compact("totalPages", "students", "order", "direction", "search", "page", "notify");

            $this->render(__DIR__."/../../views/home.view.php",$params);
        } else {
            $search = $_GET["search"];
            $students = $this->studentDataGateway->searchStudents(
                    $search,
                    $pagination["offset"],
                    $pagination["perPage"],
                    $pagination["order"],
                    $pagination["direction"]

            );
            $rowCount = $this->studentDataGateway->countSearchRows($search);
            $totalPages = $this->pager->calculateTotalPages($rowCount,$pagination["perPage"]);

            $params = compact(
                "search", "order", "direction", "totalPages", "students", "page", "notify", "rowCount"
            );

            $this->render(__DIR__."/../../views/home.view.php",$params);
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

    private function render($file, $params = [])
    {
        extract($params,EXTR_SKIP);
        return require_once "{$file}";
    }

    public function run()
    {
      if ($this->requestMethod === "GET") {
         $this->processGetRequest();
      }
    }
}
