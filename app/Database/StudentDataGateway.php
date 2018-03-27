<?php
namespace StudentList\Database;

class StudentDataGateway
{
    private $dbh;

    // Getting pdo object to work with
    public function __construct(\PDO $pdo)
    {
        $this->dbh = $pdo;
    }

    public function getUserByEmail(string $email)
    {
        $stmt = $this->dbh->prepare("SELECT * FROM students WHERE email=?");
        $stmt->bindParam(1, $email, \PDO::PARAM_STR);
        $stmt->execute();
        $row = $stmt->fetch(\PDO::FETCH_ASSOC);

        return $row;
    }
}