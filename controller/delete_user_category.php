<?php
if(session_status() == PHP_SESSION_NONE) {
    session_start();
}

include "../model/UserCategories.php";
include "../model/dao/UserCategoriesDao.php";
include "../model/DBManager.php";

use model\dao\UserCategoriesDao;

if(isset($_POST['uc_id'])){
    try {
        $user_id = $_SESSION['user_id'];
        $uc_id = htmlentities($_POST['uc_id']);
        $model_id = new \model\UserCategories($user_id);
        $del_id = UserCategoriesDao::getUserCategoryInstance()->deleteCustCategory($model_id, $uc_id);
        //include "get_user_categories_list.php";
        include "get_user_custom_categories.php";


    }
    catch (PDOException $e) {
        echo "del cust cat:: " . $e->getMessage();
    }
}


?>