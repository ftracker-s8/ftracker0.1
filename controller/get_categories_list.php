<?php
if(session_status() == PHP_SESSION_NONE) {
    session_start();
}
//function __autoload ( $class ){
//    $class = "..\\" . $class;
//    require_once str_replace("\\", "/", $class) .".php";
//}

include_once "../model/dao/CategoryDao.php";
include_once "../model/Categories.php";
include_once "../model/DBManager.php";
use \model\Categories;
use \model\dao\CategoryDao;
include_once "../model/Accounts.php";
$result = "";

//$owner_id = $_SESSION['user_id'];
//$oi = new Categories();


?>
<table class="table table-bordered table_list table-hover" id="whole_table" cellspacing="2" cellpadding="0">
    <tr class="bg_h">
        <th>Category name</th>
        <th>Description</th>
    </tr>
    <?php
    //$result = AccountDao::getAInstance()->getUserAcountsList($oi);
    $result = CategoryDao::getCategoryInstance()->getAllDefaultCategories();
    foreach ($result as $row) {
        ?>
    <tr >

        <td style="color: <?php echo $row['color'] ?>"><img width="20px" height="20px" src="images/icons/<?php echo $row['icon_url']; ?>" alt=""> <?php echo $row['category_name'] ?></td>
        <td><?php echo $row['category_desc'] ?></td>
    </tr>

    <?php
    } //end foreach
    ?>
</table>