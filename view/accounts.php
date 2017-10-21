<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
include('../model/config.php');
include "../model/userClass.php";
//include('../controller/session.php');

//$userDetails = $userClass->userDetails($user_id);
//print_r($userDetails);

?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Overview</title>
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

    <?php include_once "head.inc.php"; ?>
    <script src="js/raphael.min.js"></script>
    <script src="js/morris.min.js"></script>
    <script src="js/tracker.js"></script>
</head>
<body>
<?php include "header.php" ?>
<div id="container" class="container">
    <!--<h1>Main: Welcome --><?php //echo $userDetails->name; ?><!--</h1>-->
    <div>
        <h1>Acounts</h1>
    </div>
    <div>
        <fieldset class="field_container">
            <legend> Add new account </legend>
            <form>
                <input type="text" id="account_name" class="frm_input" placeholder="Account name">
                <input type="text" id="ammount" class="frm_input" placeholder="Ammount">
                <input type="text" id="account_desc" class="frm_input" placeholder="description">
                <input type="text" id="currency" class="frm_input" placeholder="Email">
                <input type="button" class="frm_button" value="Add" onclick="add_member()">
            </form>
        </fieldset>
    </div>

    <div>
        <?php include "../controller/get_user_account_list.php" ?>
    </div>

</div> <!-- container-->
<?php include 'footer.php' ?>

</body>
</html>