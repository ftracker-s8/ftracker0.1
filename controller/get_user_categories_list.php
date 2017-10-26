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
$oi = new UserCategories($owner_id);

$result_cust_categories = UserCategoriesDao::getUserCategoryInstance()->getAllCustomCategories($oi);
include "../view/includes/show_custom_categories.incl.php"
?>
