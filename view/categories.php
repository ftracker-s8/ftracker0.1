<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

function __autoload ( $class ){
    $class = "..\\" . $class;
    require_once str_replace("\\", "/", $class) .".php";
}
//include('../model/config.php');
//include "../model/userClass.php";
////include('../controller/session.php');
//
//include_once "../model/dao/CategoryDao.php";
//include_once "../model/Categories.php";
//include_once "../model/DBManager.php";
//include_once "../model/UserCategories.php";
//include_once "../model/dao/UserCategoriesDao.php";

use \model\dao\CategoryDao;
$user_id = "";
if(isset($_POST['user_id'])) {
$user_id = $_POST['user_id'];
}
//include "../controller/get_user_custom_categories.php";
//$result_cat = CategoryDao::getCategoryInstance()->getAllDefaultCategories();
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>$8: Categories</title>
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <link rel="stylesheet" href="css/bootstrap3.css">
    <?php include_once "head.inc.php"; ?>
    <!--    <script src="js/raphael.min.js"></script>-->
    <!--    <script src="js/morris.min.js"></script>-->
    <script src="js/tracker.js"></script>
    <script src="js/ajaxAdk.js"></script>
    <script src="js/jscolor.js"></script>

</head>
<body>
<?php include "header.php" ?>
<div id="container" class="container">

    <div class="modal fade" id="modal-default" >
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title"></h4>
                </div>
                <div class="modal-body" id="modala"></div>
                <div class="modal-footer">
                    <!--                    <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>-->
                    <!--                    <button type="button" class="btn btn-primary">Save changes</button>-->
                </div>
            </div>            <!-- /.modal-content -->
        </div>        <!-- /.modal-dialog -->
    </div>    <!-- /.modal -->

    <div class="row">

        <div class="col-md-4 adk adk-shadow">
            <h1>Categories</h1>
            <h2>Defined categories</h2>
<!--            <?php //include "../controller/get_categories_list.php"; ?> -->
            <?php include "includes/get_default_categories_list.incl.php"; ?>

        </div>

        <!-- ======================================================= -->
        <div class="col-md-7 adk-shadow col-padding10" >
            <!--            <fieldset class="field_container profile-field">-->

            <fieldset class="form-group-lg">
                <legend class="legend"> Add custom category</legend>

                <form class="form-inline">
                    <input class="form-text" type="text" id="user_cat_name" placeholder="Category name" required>
                    <select class="form-text form-inline" name="icons" id="icons">
                        <option value="kid.png" selected>Kid</option>
                        <option value="phone.png">Phone</option>
                        <option value="food.png">Food</option>
<!--                        --><?php
//                        //$result_cat = CategoryDao::getCategoryInstance()->getAllDefaultCategories();
//                        //var_dump($result_cat);
//                        include "../controller/get_user_custom_categories.php";
//                        foreach ($result as $value) {
//                            //echo "<option value=\"" . $value['uc_id'] . "\"><img src=\"\" alt=\"\">icon for " . $value['category_name'] . "</option>";}
//                        echo "<option value=\"" . $value['category_id'] . "\"><img src=\"\" alt=\"\">icon for " . $value['category_name'] . "</option>";}
//                        ?>

                    </select>

                    <input class="form-text" type="text" id="user_cat_desc" placeholder="description">

                    <input name="user_cat_color" type="hidden" id="color_value" value="99cc00">
                    <button class="jscolor {valueElement: 'color_value'}">&nbsp;</button>

<!--                    <input type="button" class="btn btn-outline-secondary frm_button" value="Add" onclick="addViaAjax('../controller/add_custom_category.php', list_container, <?//= $user_id; ?>//, 'default')"> -->
                    <input type="button" class="frm_button" value="Add" onclick="add_custom_category()">

                </form>
                <div id="err_ms_id"></div>
            </fieldset>



            <div id="list_container" class="col-md-8">
                <?php include "../controller/get_user_categories_list.php" ?>
            </div>
        </div>

    </div> <!-- end row -->


</div> <!-- container-->
<div class="container">
    <?php include 'footer.php' ?>
</div>
</body>
</html>