<?php
if(session_status() == PHP_SESSION_NONE) {
    session_start();
}
//function __autoload ( $class ){
//    $class = "..\\" . $class;
//    require_once str_replace("\\", "/", $class) .".php";
//}

//include_once "../model/dao/CategoryDao.php";
//include_once "../model/Categories.php";
//include_once "../model/DBManager.php";
use \model\Categories;
use \model\dao\CategoryDao;
include_once "../model/Accounts.php";
$result = "";

//$owner_id = $_SESSION['user_id'];
//$oi = new Categories();

$categories_result = CategoryDao::getCategoryInstance()->getAllDefaultCategories();
echo "get cat list";
?>