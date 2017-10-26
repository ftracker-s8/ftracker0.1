<?php
if(session_status() == PHP_SESSION_NONE) {
    session_start();
}
//include("../model/config.php");
//include('../model/userClass.php');
//include('../model/UserDAO.php');
//include('../model/UserVO.php');
//include('../model/DBManager.php');

use model\UserDAO;
use model\UserVO;



//Try to accomplish connection with the database
if (isset($_SESSION['user_id'])) {
    try {
        $user_id = $_SESSION['user_id'];
        $user_model = new UserVO($user_id);

        //$userArr = $userDao->getUserPic($user_id);
        $all_user_data = UserDAO::getUserInstance()->getUserInfo($user_id);
        //var_dump($all_user_data);


    } catch (PDOException $e) {
        echo "Error PDO pic: " . $e->getMessage();
        //header("Location: ../../view/error/pdo_error.php");
    }
} else {
    echo "cant get username";
}