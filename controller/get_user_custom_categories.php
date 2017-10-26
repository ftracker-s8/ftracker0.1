<?php
/**
 * Created by PhpStorm.
 * User: assen.kovachev
 * Date: 25.10.2017 г.
 * Time: 15:24 ч.
 */
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

use model\UserCategories;
use model\dao\UserCategoriesDao;
$user_id = "";

if(isset($_SESSION['user_id'])) {
    $user_id = $_SESSION['user_id'];
}
$uid = new UserCategories($user_id);

$result_user_categories = UserCategoriesDao::getUserCategoryInstance()->getAllCustomCategories($uid);

//$result_cat = CategoryDao::getCategoryInstance()->getAllDefaultCategories();
