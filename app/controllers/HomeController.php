<?php
namespace StudentList\Controllers;

use StudentList\Database\StudentDataGateway;
use StudentList\Helpers\Pager;

class HomeController extends BaseController
{
    private $pager;
    private $studentDataGateway;

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

        if (!isset($_GET["search"])) {
            $students = $this->studentDataGateway->getStudents(
                    $pagination["offset"],
                    $pagination["perPage"],
                    $pagination["orderBy"],
                    $pagination["sort"]
            );
            $rowCount = $this->studentDataGateway->countTableRows();
            $totalPages = $this->pager->calculateTotalPages($rowCount, $pagination["perPage"]);

            $params["totalPages"] = $totalPages;
            $params["students"] = $students;

            $this->render(__DIR__."/../../views/home.view.php",$params);
        } else {
            $students = $this->studentDataGateway->searchStudents(
                    $_GET["search"],
                    $pagination["offset"],
                    $pagination["perPage"],
                    $pagination["orderBy"],
                    $pagination["sort"]

            );
            $rowCount = count($students);
            $totalPages = $this->pager->calculateTotalPages($rowCount,$pagination["perPage"]);

            $params["totalPages"] = $totalPages;
            $params["students"] = $students;

            $this->render(__DIR__."/../../views/home.view.php",$params);
        }
    }

    /**
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
        $pagination["orderBy"] = isset($_GET["order"]) ? strval($_GET["order"]) : "exam_score";
        $pagination["sort"] = isset($_GET["sort"]) ? strval($_GET["sort"]) : "DESC";

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
