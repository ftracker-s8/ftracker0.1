<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

include "../model/UserCategories.php";
include "../model/dao/UserCategoriesDao.php";
require "../model/DBManager.php";

//if (class_exists('UserCategories')) {
//    $oi = new UserCategories($owner_id);
//}

use model\UserCategories;
use model\dao\UserCategoriesDao;

$owner_id = $_SESSION['user_id'];
$oi = new UserCategories($owner_id);

$result = UserCategoriesDao::getUserCategoryInstance()->getAllCustomCategories($owner_id);
var_dump($result);
?>

