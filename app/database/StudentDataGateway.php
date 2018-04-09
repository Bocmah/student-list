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
     * @return mixed
     */
    public function getStudentByEmail(string $email)
    {
        $statement = $this->pdo->prepare(
            "SELECT * FROM students WHERE email=?"
        );
        $statement->bindParam(1, $email, \PDO::PARAM_STR);
        $statement->execute();
        $row = $statement->fetch(\PDO::FETCH_ASSOC);

        return $row;
    }

    /**
     * @return mixed
     */
    public function countTableRows()
    {
        $statement = $this->pdo->prepare(
            "SELECT count(*) FROM students"
        );
        $statement->execute();

        return $statement->fetchColumn();
    }

    public function getStudents(int $offset, int $limit)
    {
        $statement = $this->pdo->prepare(
          "SELECT name, surname, group_number, exam_score
                     FROM students
                     LIMIT {$offset}, {$limit}   
          "
        );
        $statement->execute();

        return $statement->fetchAll(\PDO::FETCH_ASSOC);
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
        $row = $statement->fetch(\PDO::FETCH_ASSOC);

        return $row;
    }
}