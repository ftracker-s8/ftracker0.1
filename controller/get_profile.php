<?php
/**
 * Created by PhpStorm.
 * User: assen.kovachev

 */
//include("../model/config.php");
//include('../model/userClass.php');
//include('../model/UserDAO.php');
//include('../model/UserVO.php');

use model\UserDAO;
use model\UserVO;

$user = new \model\UserVO();

echo "ok;";
//Try to accomplish connection with the database
try {

    $userDao = \model\UserDao::getUserInstance();

    //$user->setUserId($_SESSION['user_id']);

    //Receive array with user's info
    $user_id = $_SESSION['user_id'];
    $userArr = $userDao->getUserPic($user_id);


} catch (PDOException $e) {
    echo "Error PDO pic: " . $e->getMessage();
    //header("Location: ../../view/error/pdo_error.php");
}