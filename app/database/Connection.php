<?php
namespace StudentList\Database;

class Connection
{
    private static $instance;

    private function __construct()
    {
    }

    /**
     * @return Connection
     */
    public static function getInstance()
    {
        if (empty(self::$instance)) {
            self::$instance = new Connection();
        }
        return self::$instance;
    }

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