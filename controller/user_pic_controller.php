<?php
/**
 * Created by PhpStorm.
 * User: assen.kovachev
 * Date: 18.10.2017 г.
 * Time: 02:29 ч.
 */
//include 'session.php';
//include "../model/DBManager.php";
//include '../model/userClass.php';
include '../model/UserDAO.php';
include '../model/UserVO.php';

$user_id = "";
if(isset($_SESSION['user_id'])){
    $user_id = $_SESSION['user_id'];
}
else {
    echo "Please log in";
}

$the_url = null;
//$userClass = new \model\userClass();

try {

    //$userPic = $userClass->uuserPic($user_id);
    $userPic = \model\UserDAO::getUserInstance()->userPic($user_id);

    $the_url = $userPic->user_pic;
    //var_dump($the_url);
}
catch (Exception $e) {
    echo "File ERR: " . $e->getMessage();
}
?>



