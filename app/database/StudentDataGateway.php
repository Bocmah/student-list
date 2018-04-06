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

    public function insertStudent(Student $student)
    {
        $statement = $this->pdo->prepare(
            "INSERT INTO students(first_name, surname, gender, group_number, 
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