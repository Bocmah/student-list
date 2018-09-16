<?php
namespace StudentList\Database;

use StudentList\Entities\Student;

class StudentDataGateway
{
    /**
     * @var \PDO
     */
    private $pdo;

    /**
     * StudentDataGateway constructor.
     * @param \PDO $pdo
     */
    public function __construct(\PDO $pdo)
    {
        $this->pdo = $pdo;
    }

    /**
     * Inserts new Student into `students` table
     *
     * @param Student $student
     *
     * @return void
     */
    public function insertStudent(Student $student): void
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
     * Updates a student row in `students` table
     *
     * @param Student $student
     *
     * @return void
     */
    public function updateStudent(Student $student): void
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
     * Returns a number of records found containing $email
     *
     * @param string $email
     *
     * @return bool
     */
    public function checkIfEmailExists(string $email): bool
    {
        $statement = $this->pdo->prepare(
            "SELECT COUNT(*) FROM students WHERE email=?"
        );
        $statement->bindParam(1, $email, \PDO::PARAM_STR);
        $statement->execute();

        $rowCount = (int)$statement->fetchColumn();

        return $rowCount > 0 ? true : false;
    }

    /**
     * Returns a number of rows in the `students` table
     *
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

    /**
     * Returns a number of rows containing $keywords
     *
     * @param string $keywords
     *
     * @return int
     */
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

    /**
     * Returns an array of student rows
     *
     * @param int $offset
     * @param int $limit
     * @param string $orderBy Field to order by
     * @param string $sort Ordering direction
     *
     * @return array
     */
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

    /**
     * Returns an array of student rows found by $keywords
     *
     * @param string $keywords String to search for
     * @param int $offset
     * @param int $limit
     * @param string $orderBy Field to order by
     * @param string $sort Ordering direction
     *
     * @return array
     */
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

    /**
     * Makes sure that ordering parameters don't contain something apart from whitelisted values
     *
     * @param string $orderBy Field to order by
     * @param string $sort Ordering direction
     *
     * @return array
     */
    private function sanitizeSortingParams(string $orderBy, string $sort)
    {
        $orderWhiteList = ["name", "surname", "group_number", "exam_score"];

        if (!in_array($orderBy, $orderWhiteList,true)) {
            $orderBy = "exam_score";
        }

        if ($sort !== "DESC" && $sort !== "ASC") {
            $sort = "DESC";
        }

        $sortingParams = array(
            "sort" => $sort,
            "orderBy" => $orderBy
        );

        return $sortingParams;
    }

    /**
     * Returns a student row containing $hash
     *
     * @param string $hash
     *
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