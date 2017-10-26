<?php
/**
 * Created by PhpStorm.
 * User: assen.kovachev
 * Date: 19.10.2017 г.
 * Time: 17:08 ч.
 */

namespace model\dao;


use model\DBManager;

class CategoryDao
{
    private static $instance;
    private $pdo;

    private function __construct()    {
        $this->pdo = DBManager::getInstance()->getConnection();
    }

    public static function getCategoryInstance(){
        if(self::$instance === null){
            self::$instance = new CategoryDao();
        }
        return self::$instance;
    }

    const GET_CATEGORIES_LIST = "INSERT INTO users (user_email, `password`, first_name, last_name) VALUES (?, ?, ?, ?)";
    const ADD_CUSTOM_CATEGORY = "INSERT INTO users (user_email, `password`, first_name, last_name) VALUES (?, ?, ?, ?)";
    //private
    public function getAllDefaultCategories() {
        try {

            $query = "SELECT * FROM categories";
            $stm = $this->pdo->prepare($query);
            $stm->execute();
            $result = $stm->fetchAll(\PDO::FETCH_ASSOC);
            return $result;

        } catch (\PDOException $e) {
            echo "Caaaateg" . $e->getMessage();
            trow: new \PDOException();
        }
    }



}