<?php
/**
 * Created by PhpStorm.
 * User: Sheilly
 * Date: 23.10.2017 г.
 * Time: 15:01 ч.c
 */

namespace model\dao;


use model\DBManager;
use model\UserCategories;

class UserCategoriesDao
{
    private static $instance;
    private $pdo;

    private function __construct()
    {
        $this->pdo = DBManager::getInstance()->getConnection();
    }

    public static function getUserCategoryInstance()
    {
        if (self::$instance === null) {
            self::$instance = new UserCategoriesDao();
        }
        return self::$instance;
    }

    const GET_CATEGORIES_LIST = "SELECT * FROM user_categories WHERE user_id = ?";
    //const ADD_CUSTOM_CATEGORY = "INSERT INTO users (user_email, `password`, first_name, last_name) VALUES (?, ?, ?, ?)";

    public function getAllCustomCategories(UserCategories $uid) {
        try {

            //$pdo = \model\DBManager::getInstance()->getConnection();
            //$query = "SELECT * FROM accounts WHERE account_id = '" . $_POST["account_id"] . "'";
            $query = "SELECT * FROM user_categories WHERE user_id = ?";
            $stm = $this->pdo->prepare($query);
            $stm->execute($uid->getUserId());
            $result = $stm->fetchAll(\PDO::FETCH_ASSOC);
            return $result;

        } catch (\PDOException $e) {
            echo "Caaaateg" . $e->getMessage();
            trow: new \PDOException();
        }
    }
}