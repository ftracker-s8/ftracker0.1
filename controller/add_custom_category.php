<?php
//TODO limit number of categories
if(session_status() == PHP_SESSION_NONE) {
    session_start();
}
include "../model/UserCategories.php";
include "../model/dao/UserCategoriesDao.php";
include "../model/DBManager.php";

use model\dao\UserCategoriesDao;

if(isset($_POST['user_cat_name'])){
    $user_id = $_SESSION["user_id"];
    $user_cat_name = $_POST["user_cat_name"];
    $user_cat_icon = $_POST["user_cat_icon"];
    $user_cat_desc = $_POST["user_cat_desc"];
    $user_cat_color = "#".$_POST["user_cat_color"];
//    $user_cat_name2= $user_cat_name1;

    $user_ida = new \model\UserCategories($user_id);
  //  $u_cat = new \model\UserCategories($user_cat_name2);

    try {
        UserCategoriesDao::getUserCategoryInstance()->addCustomCategory($user_ida, $user_cat_name, $user_cat_icon, $user_cat_color, $user_cat_desc);
        //require "../controller/get_user_account_list.php";
        echo "SUCCESS";
        //require "get_user_account_list.php";
        include "get_user_custom_categories.php";

    }
    catch (PDOException $e) {
        echo "err add cust cat" . $e->getMessage();
    }
}
else {
    echo "error";
}
