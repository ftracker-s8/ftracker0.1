<?php
if(session_status() == PHP_SESSION_NONE) {
    session_start();
}
//function __autoload ( $class ){
//    $class = "..\\" . $class;
//    require_once str_replace("\\", "/", $class) .".php";
//}

include_once "../model/dao/UserCategoriesDao.php";
include_once "../model/UserCategories.php";
include_once "../model/DBManager.php";
use \model\UserCategories;
use \model\dao\UserCategoriesDao;
//include_once "../model/Accounts.php";
$result = "";

$owner_id = $_SESSION['user_id'];
//selectCategoriesUnionList
$union_result = UserCategoriesDao::getUserCategoryInstance()->selectCategoriesUnionList($owner_id);
