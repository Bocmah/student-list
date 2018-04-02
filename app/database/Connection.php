<?php
namespace StudentList\Database;

class Connection
{
    /**
     * @param array $config
     * @return \PDO
     */
    public function make(array $config): \PDO
    {
        try {
            return new \PDO(
                $config["database"]['connection'].';dbname='.$config["database"]['name'],
                $config["database"]['username'],
                $config["database"]['password'],
                $config["database"]['options']
            );
        } catch (\PDOException $e) {
            die($e->getMessage());
        }
    }
}