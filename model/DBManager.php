<?php

namespace model;

class DBManager
{
    private static $instance;
    private $pdo;
    const DB_IP   = "localhost";
    const DB_PORT = "3306";
    const DB_USER = "id3203367_admina";
    const DB_PASS = "ZOqMIBwHI0c3zCXl";
    const DB_NAME = "id3203367_s8ftracker_db";

    private function __construct(){
        try{
            //$this->pdo = new \PDO("mysql:host=".self::DB_IP.":".self::DB_PORT.";dbname=".self::DB_NAME, self::DB_USER, self::DB_PASS);
            $this->pdo = new \PDO("mysql:host=".self::DB_IP.";dbname=".self::DB_NAME, self::DB_USER, self::DB_PASS);
            $this->pdo->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
            $this->pdo->query("USE " . self::DB_NAME);
        }
        catch (\PDOException $e){
            echo "PDO Problem. ERR: " . $e->getMessage();
        }
    }

    public static function getInstance(){
        if(self::$instance === null){
            self::$instance = new DBManager();
        }
        return self::$instance;
    }

    public function getConnection(){
        return $this->pdo;
    }
}