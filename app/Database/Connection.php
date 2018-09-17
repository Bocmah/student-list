<?php
namespace StudentList\Database;

class Connection
{
    /**
     * Establishes PDO connection via data passed through $config
     *
     * @param array $config
     * @return \PDO
     */
    public function make(array $config): \PDO
    {
        try {
            return new \PDO(
                $config["database"]["connection"].";dbname=".$config["database"]["name"].
                ";charset=".$config["database"]["encoding"],
                $config["database"]["username"],
                $config["database"]["password"],
                $config["database"]["options"]
            );
        } catch (\PDOException $e) {
            die($e->getMessage());
        }
    }
}