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
        if (!isset($_GET["search"])) {
            $page = isset($_GET["page"]) ? intval($_GET["page"]) : 1;
            $perPage = 10;
            $offset = $this->pager->calculatePositioning($page, $perPage);
            $students = $this->studentDataGateway->getStudents($offset,$perPage);
            $columnCount = $this->studentDataGateway->countTableRows();
            $totalPages = $this->pager->calculateTotalPages($columnCount, $perPage);

            $params["totalPages"] = $totalPages;
            $params["students"] = $students;

            $this->render(__DIR__."/../../views/home.view.php",$params);
        } else {
            var_dump($_GET["search"]);
            $res = $this->studentDataGateway->searchStudents($_GET["search"]);
            var_dump($res);
        }
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
