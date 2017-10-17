<?php

namespace model;

include "DBManager.php";

use model;
/**
 * Created by PhpStorm.
 * User: assen.kovachev
 */

class UserDAO{
    private static $instance;
    private $pdo;

    private function __construct()    {
        $this->pdo = DBManager::getInstance()->getConnection();
    }

    public function getByUserId(UserVO $u) {
        $sql = "SELECT * FROM users WHERE user_id = ?";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute(array($u->getUserId()));
        return $stmt->execute($sql);
    }

    public static function getUserInstance(){
        if(self::$instance === null){
            self::$instance = new UserDao();
        }
        return self::$instance;
    }
    public function existsUser (UserVO $u) {
        $sql = "SELECT count(*) as counter FROM `users` WHERE `user_email` = ?";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute(array($u->getUserEmail()));

        return $stmt->fetch(\PDO::FETCH_ASSOC)["counter"] > 0;
    }
    public function insertUser(UserVO $u) {
        $sql = "INSERT INTO users (user_email, password, first_name, last_name) VALUES (?,?,?,?) ";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute(array($u->getUserEmail(), $u->getPassword(), $u->getFirstName(), $u->getLastName()));

        $u->setUserId($this->pdo->lastInsertId());
    }

    public function deleteUser(UserVO $u) {
    }

    public function userLogin2(UserVO $u)
    {
        //$db = getDB();
        //$hash_password= hash('sha256', $password);
        $sql = "SELECT user_id FROM users WHERE user_email = ? AND  password = ?";
        //$hash_password= $password;
        //$stmt = $db->prepare($sql);
        $stmt = $this->pdo->prepare($sql);
        //        $stmt->bindParam("usernameEmail", $usernameEmail,\PDO::PARAM_STR) ;
//        $stmt->bindParam("hash_password", $hash_password,\PDO::PARAM_STR) ;
        //$stmt->execute(array($user_email, $hash_password));
        $stmt->execute(array($u->getUserId(), $u->getPassword()));
        $count=$stmt->rowCount();
        $data=$stmt->fetch(\PDO::FETCH_OBJ);
        //$db = null;
        if($count)
        {
            $_SESSION['user_id']=$data->user_id;
            return true;
        }
        else
        {
            return false;
        }
    }
    public function userLogin3($user_name, $password)
    {
        $sql = "SELECT user_id, first_name FROM users WHERE user_email = ? AND  password = ?";
        //$hash_password= $password;
        //$stmt = $db->prepare($sql);
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute(array($user_name, $password));
        $count=$stmt->rowCount();
        $data=$stmt->fetch(\PDO::FETCH_OBJ);
        //$db = null;
        if($count)
        {
            $_SESSION['user_id']=$data->user_id;
            $_SESSION['user_name']=$data->first_name;
            return true;
        }
        else
        {
            return false;
        }
    }
    public function takeUserPic(UserVO $u) {
        $sql = "SELECT user_pic FROM users WHERE user_id = ?";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute(array($u->getUserPic()));
        return $stmt->execute($sql);
    }


}