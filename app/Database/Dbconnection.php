<?php

namespace app\Database;

class Dbconnection
{
    public $pdo;
    private $dbName;

    public function __construct($dbName = 'TEST')
    {
        $this->dbName = strtoupper($dbName);
        try {
            $this->pdo = new \PDO(
                constant("DB_DSN_$this->dbName"),
                constant("DB_USER_$this->dbName"),
                constant("DB_PASS_$this->dbName")
            );

            $this->pdo->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
        } catch (\PDOException $e) {
            echo "ERROR EN LA CONEXIÓN: " . $e->getMessage();
            die;
        }
    }
    public static function conn($dbName)
    {
        return new Dbconnection($dbName);
    }
}
