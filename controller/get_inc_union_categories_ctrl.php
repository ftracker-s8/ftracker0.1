<?php
if(session_status() == PHP_SESSION_NONE) {
    session_start();
}
$uid = "";
if(isset($_SESSION['user_id'])) {
    $uid = $_SESSION['user_id'];
}
//$uid = 26;
$united = "";
include_once "../model/dao/UserCategoriesDao.php";
include_once "../model/UserCategories.php";
include_once "../model/DBManager.php";

$united_inc_list = \model\dao\UserCategoriesDao::getUserCategoryInstance()->selectIncCategories($uid);
// var_dump($united); //ok
