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

    private function __construct() {
        $this->pdo = DBManager::getInstance()->getConnection();
    }

    public static function getUserCategoryInstance() {
        if (self::$instance === null) {
            self::$instance = new UserCategoriesDao();
        }
        return self::$instance;
    }
//uc_iduser_cat_nameuser_cat_iconuser_cat_coloruser_cat_descuser_id
    //const GET_CATEGORIES_LIST = "SELECT * FROM user_categories WHERE user_id = ?";
    const GET_UNITED_CATEGORIES_LIST = "SELECT * FROM CategoriesUnion WHERE user_id = 0 OR user_id = ?";
    const GET_USER_CATEGORIES_LIST = "SELECT * FROM `categories` WHERE `user_id` = ?";
    //const ADD_CUSTOM_CATEGORY = "INSERT INTO `user_categories` (user_id, user_cat_name, user_cat_icon, user_cat_color, user_cat_desc) VALUES (?, ?, ?, ?, ?)";
    const ADD_CUSTOM_CATEGORY = "INSERT INTO `categories` (user_id, category_name, icon_url, color, category_desc) VALUES (?, ?, ?, ?, ?)";
    const RM_CUSTOM_CATEGORY = "DELETE FROM `categories` WHERE user_id = ? AND category_id = ?";
    //const ADD_CUSTOM_CATEGORY = "INSERT INTO users (user_email, `password`, first_name, last_name) VALUES (?, ?, ?, ?)";

    public function selectCategoriesUnionList($uid) {
        //$sql = "";
        $stm = $this->pdo->prepare(self::GET_UNITED_CATEGORIES_LIST); //cat union default + user
        $stm->execute([$uid]);
        $cat_list_result = $stm->fetchAll(\PDO::FETCH_ASSOC);
        return $cat_list_result;
    }

    public function getAllCustomCategories($user_id) {
            //$query = "SELECT * FROM `user_categories` WHERE `user_id` = ?";
            $stm = $this->pdo->prepare(self::GET_USER_CATEGORIES_LIST);
            $stm->execute([$user_id]);
            $result = $stm->fetchAll(\PDO::FETCH_ASSOC);

            return $result;
    }
    public function addCustomCategory(UserCategories $u, $user_cat_name, $user_cat_icon, $user_cat_color, $user_cat_desc) {
        try {
            //$query = "SELECT * FROM `user_categories` WHERE `user_id` = ?";
            $stm = $this->pdo->prepare(self::ADD_CUSTOM_CATEGORY);
            $stm->execute([$u->getUserId(), $user_cat_name, $user_cat_icon, $user_cat_color, $user_cat_desc]);
            //$result = $stm->fetchAll(\PDO::FETCH_ASSOC);
            //return $result;

        } catch (\PDOException $e) {
            echo "Custom Cat Err" . $e->getMessage();
            trow: new \PDOException();
        }
    }

    /**
     * @return mixed
     */
    public function deleteCustCategory(UserCategories $u, $uc_id){
        $stm = $this->pdo->prepare(self::RM_CUSTOM_CATEGORY);
        $stm->execute([$u->getUserId(), $uc_id]);
    }

    public function selectExpCategories($uid) {
        $sql = "SELECT * FROM categories WHERE category_id < 12 OR category_id > 16 AND `user_id` IN (0, ?)";
        //$sql = "SELECT user_id FROM `CategoriesUnion`";
        $stm = $this->pdo->prepare($sql);
        $stm->execute([$uid]);
        $results = $stm->fetchAll(\PDO::FETCH_ASSOC);
        return $results;
    }
    public function selectIncCategories($uid) {
        $sql = "SELECT * FROM categories WHERE category_id >= 12 AND category_id <= 16 AND `user_id` IN (0, ?)";
        //$sql = "SELECT user_id FROM `CategoriesUnion`";
        $stm = $this->pdo->prepare($sql);
        $stm->execute([$uid]);
        $results = $stm->fetchAll(\PDO::FETCH_ASSOC);
        return $results;
    }

}