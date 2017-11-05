<?php
//include 'session.php';
//include "../model/DBManager.php";
//include '../model/userClass.php';
include_once '../model/UserDAO.php';
include_once '../model/UserVO.php';

$user_id = "";
if(isset($_SESSION['user_id'])){
    $user_id = $_SESSION['user_id'];
}
else {
    echo "Please log in";
}

$the_url = null;
try {
    $userPic = \model\UserDAO::getUserInstance()->userPic($user_id);
    $the_url = $userPic->user_pic;
}
catch (Exception $e) {
    echo "File ERR: " . $e->getMessage();
}




