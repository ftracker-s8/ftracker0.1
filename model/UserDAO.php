<?php

namespace model;

include "DBManager.php";

class UserDAO{
    private static $instance;
    private $pdo;
    const REGISTER_USER = "INSERT INTO users (user_email, `password`, first_name, last_name) VALUES (?, ?, ?, ?)";
    const CREATE_NEW_ACCOUNT = "INSERT INTO accounts (account_name, `ammount`, owner_id) VALUES ('cash', '0', ?)";
    const EDIT_USER = "UPDATE users SET user_email = ?, `password` = ?, first_name = ?, last_name = ? WHERE user_id = ?";
    const GET_USER_INFO = "SELECT user_email, first_name, last_name, user_pic, activated, last_login FROM users WHERE user_id = ?";
    //const GET_USER_INFO = "SELECT * FROM users WHERE user_id = ?";

    private function __construct()    {
        $this->pdo = DBManager::getInstance()->getConnection();
    }

    public function getByUserId(UserVO $u) {
        $sql = "SELECT user_email, first_name, last_name, user_pic, activated, last_login FROM users WHERE user_id = ?";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute(array($u->getUserId()));

        //return $stmt->execute($sql);
    }

    public function getUPass($u) {
        $sql = "SELECT `password` FROM users WHERE user_id = ?";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute(array($u));
        $result = $stmt->fetch(\PDO::FETCH_ASSOC);
        return $result;


        //return $stmt->execute($sql);
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
    public function getUserName(UserVO $user_id) {
        $sql = "SELECT (first_name, last_name) as usernama, user_id FROM `users` WHERE `user_id` = ?";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute(array($user_id->getUserId()));

        $data=$stmt->fetch(\PDO::FETCH_OBJ);
        $current_user_name = $data->usernama;

        //$_SESSION['user_name']=$data->user_id;
        //return $stmt->fetch(\PDO::FETCH_ASSOC)["counter"] > 0;
        return $current_user_name;
    }

    function registerUser2(UserVO $user)
    {
        //Use try catch, to have transaction
        try {
            $this->pdo->beginTransaction();
            $statement = $this->pdo->prepare(self::REGISTER_USER);
            $statement->execute(array($user->getUserEmail(), $user->getPassword(), $user->getFirstName(), $user->getLastName()));
            $lastInsertId = $this->pdo->lastInsertId();

            $statement = $this->pdo->prepare(self::CREATE_NEW_ACCOUNT);
            $statement->execute(array($lastInsertId));

            $this->pdo->commit();
            return $lastInsertId; //Return registered user's ID

        } catch (\PDOException $e) {
               $this->pdo->rollBack();
               echo "UDAO err reg: " . $e->getMessage();
            //header("Location: ../view/registererror.html");
        }
    }

    public function deleteUser(UserVO $u) {
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

    function getUserInfo($user)
    {
        $statement = $this->pdo->prepare(self::GET_USER_INFO);
        $statement->execute([$user]);
        $userInfo = $statement->fetchAll(\PDO::FETCH_ASSOC);
        return $userInfo;
    }

    function userProfile(UserVO $user)
    {
        try {
            $this->pdo->beginTransaction();
            $statement = $this->pdo->prepare(self::EDIT_USER);
            $statement->execute(array($user->getUserEmail(), $user->getPassword(), $user->getFirstName(), $user->getLastName(),
               $user->getUserPic(), $user->getUserId()));
            //$statement = $this->pdo->prepare(self::UPDATE_ADDRESS);
            //$statement->execute(array($user->getAddress(), $user->getPersonal(), $user->getId()));
            $this->pdo->commit();
        } catch (\PDOException $e) {
            $this->pdo->rollBack();
            header("Location: ../../view/error/pdo_error.php");
        }
    }
    function getUserPic(UserVO $user_id) {
        $sql = "SELECT user_pic FROM `users` WHERE `user_id` = ?";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute(array($user_id));

        $url = $stmt->fetch(\PDO::FETCH_ASSOC);
        $_SESSION['user_pic'] = end($url);

    }


    public function userPic($user_id) {
            //$db = DBManager::getInstance()->getConnection();
            $stmt = $this->pdo->prepare("SELECT user_pic FROM `users` WHERE `user_id` = ?");
            //$stmt->bindParam("uid", $user_id,\PDO::PARAM_INT);
            $stmt->execute(array($user_id));
            $data = $stmt->fetch(\PDO::FETCH_OBJ);
            return $data;
    }

    public function updateUserInfo(\model\UserVO $user) {
        $sql = "UPDATE users SET user_email = ?, first_name = ?, last_name = ? WHERE user_id = ?";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([$user->getUserEmail(), $user->getFirstName(), $user->getLastName(), $user->getUserId()]);
        //$data = $stmt->fetch(\PDO::FETCH_OBJ);
        //return $data;
    }
    public function updateUserPassword ($uid, $new_password) {
        $sql = "UPDATE users SET `password` = ? WHERE user_id = ?";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([$new_password, $uid]);
    }

}

?>
