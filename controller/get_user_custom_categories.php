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
$uid = $user_id;
try {
    $result_user_categories = UserCategoriesDao::getUserCategoryInstance()->getAllCustomCategories($uid);
}
catch (PDOException $e) {
    echo "ee" . $e->getMessage();
}

include "../view/includes/show_custom_categories.incl.php";
//$result_cat = CategoryDao::getCategoryInstance()->getAllDefaultCategories();
