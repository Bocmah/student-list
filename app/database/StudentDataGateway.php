<?php
namespace StudentList\Database;

use StudentList\Entities\Student;

class StudentDataGateway
{
    private $pdo;

    // Getting pdo object to work with
    public function __construct(\PDO $pdo)
    {
        $this->pdo = $pdo;
    }

    /**
     * @param Student $student
     */
    public function insertStudent(Student $student)
    {
        $statement = $this->pdo->prepare(
            "INSERT INTO students(name, surname, gender, group_number, 
                                            email, exam_score, birth_year, residence, hash)
                       VALUES (:name, :sname, :gender, :groupnum, :email, :examscore, :byear, :residence, :hash)"
        );
        $statement->execute(array(
           "name" => $student->getName(),
           "sname" => $student->getSurname(),
           "gender" => $student->getGender(),
           "groupnum" => $student->getGroupNumber(),
           "email" => $student->getEmail(),
           "examscore" => $student->getExamScore(),
           "byear" => $student->getBirthYear(),
            "residence" => $student->getResidence(),
            "hash" => $student->getHash()
        ));
    }

    /**
     * @param Student $student
     */
    public function updateStudent(Student $student)
    {
        $statement = $this->pdo->prepare(
          "UPDATE students 
                     SET `name` = :name,
                         `surname` = :sname,
                         `gender` = :gender,
                         `group_number` = :groupnum,
                         `email` = :email,
                         `exam_score` = :examscore,
                         `birth_year` = :byear,
                         `residence` = :residence
                     WHERE `hash` = :hash"
        );
        $statement->execute(array(
            "name" => $student->getName(),
            "sname" => $student->getSurname(),
            "gender" => $student->getGender(),
            "groupnum" => $student->getGroupNumber(),
            "email" => $student->getEmail(),
            "examscore" => $student->getExamScore(),
            "byear" => $student->getBirthYear(),
            "residence" => $student->getResidence(),
            "hash" => $student->getHash()
        ));
    }

    /**
     * @param string $email
     * @return int
     */
    public function checkIfEmailExists(string $email): int
    {
        $statement = $this->pdo->prepare(
            "SELECT COUNT(*) FROM students WHERE email=?"
        );
        $statement->bindParam(1, $email, \PDO::PARAM_STR);
        $statement->execute();

        return (int)$statement->fetchColumn();
    }

    /**
     * @return int
     */
    public function countTableRows(): int
    {
        $statement = $this->pdo->prepare(
            "SELECT COUNT(*) FROM students"
        );
        $statement->execute();

        return (int)$statement->fetchColumn();
    }

    public function countSearchRows(string $keywords): int
    {
        $statement = $this->pdo->prepare(
          "SELECT COUNT(*) FROM students
                     WHERE CONCAT(`name`,' ',`surname`,' ',`group_number`,' ',`exam_score`)
                     LIKE :keywords"
        );
        $statement->bindValue("keywords", "%".$keywords."%");
        $statement->execute();

        return (int)$statement->fetchColumn();
    }

    public function getStudents(int $offset, int $limit, string $orderBy, string $sort)
    {
        $sortingParams = $this->sanitizeSortingParams($orderBy, $sort);

        $statement = $this->pdo->prepare(
          "SELECT `name`, `surname`, `group_number`, `exam_score`
                     FROM `students`
                     ORDER BY {$sortingParams['orderBy']} {$sortingParams['sort']}
                     LIMIT :offset, :limit
          "
        );
        $statement->bindValue(":offset",$offset,\PDO::PARAM_INT);
        $statement->bindValue(":limit", $limit, \PDO::PARAM_INT);
        $statement->execute();

        return $statement->fetchAll(\PDO::FETCH_ASSOC);
    }

    public function searchStudents(string $keywords, int $offset, int $limit, string $orderBy, string $sort)
    {
        $sortingParams = $this->sanitizeSortingParams($orderBy, $sort);

        $statement = $this->pdo->prepare(
          "SELECT * FROM students
                     WHERE CONCAT(`name`,' ',`surname`,' ',`group_number`,' ',`exam_score`)
                     LIKE :keywords
                     ORDER BY {$sortingParams['orderBy']} {$sortingParams['sort']}
                     LIMIT :offset, :limit"
        );
        $statement->bindValue("keywords", "%".$keywords."%");
        $statement->bindValue(":offset",$offset,\PDO::PARAM_INT);
        $statement->bindValue(":limit", $limit, \PDO::PARAM_INT);
        $statement->execute();

        return $statement->fetchAll(\PDO::FETCH_ASSOC);
    }

    private function sanitizeSortingParams(string $orderBy, string $sort)
    {
        $orderWhiteList = ["name", "surname", "group_number", "exam_score"];

        if (!in_array($orderBy, $orderWhiteList,true)) {
            $orderBy = "exam_score";
        }

        if ($sort !== "DESC" && $sort !== "ASC") {
            $sort = "ASC";
        }

        $sortingParams = array(
            "sort" => $sort,
            "orderBy" => $orderBy
        );

        return $sortingParams;
    }

    /**
     * @param string $hash
     * @return mixed
     */
    public function getStudentByHash(string $hash)
    {
        $statement = $this->pdo->prepare(
            "SELECT * FROM students WHERE hash=?"
        );
        $statement->bindParam(1,$hash,\PDO::PARAM_STR);
        $statement->execute();

        return $statement->fetch(\PDO::FETCH_ASSOC);
    }
}