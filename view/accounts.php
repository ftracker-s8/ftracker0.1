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
    <title>Accounts</title>
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

    <?php include_once "head.inc.php"; ?>
    <script src="js/raphael.min.js"></script>
    <script src="js/morris.min.js"></script>
    <script src="js/tracker.js"></script>
    <script src="js/ajaxAdk.js"></script>

    <style>
        .example-modal .modal {
            position: relative;
            top: auto;
            bottom: auto;
            right: auto;
            left: auto;
            display: block;
            z-index: 1;
        }

        .example-modal .modal {
            background: transparent !important;
        }
    </style>
</head>
<body>
<?php include "header.php" ?>
<div id="container" class="container">
    <!--<h1>Main: Welcome --><?php //echo $userDetails->name; ?><!--</h1>-->
    <div>
        <h1>Acounts</h1>
    </div>
    <!-- <div class="box-body">
        <button type="button" class="btn btn-default" data-toggle="modal" data-target="#modal-default" onclick="updateUser()">
            Launch Default Modal
        </button>
    </div> -->

<!-- ================================== -->

    <div class="modal fade" id="modal-default">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Account modify</h4>
                </div>
                <div class="modal-body" id="modala"></div>
                <div class="modal-footer">
<!--                    <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>-->
<!--                    <button type="button" class="btn btn-primary">Save changes</button>-->
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    <!-- /.modal -->
    <!-- ======================================================= -->
    <div>
        <fieldset class="field_container profile-field">
            <legend> Add new account </legend>
            <form class="form-inline">
                <input class="form-text" type="text" id="account_name" placeholder="Account name" required>
                <input class="form-text" type="number" id="ammount" placeholder="Ammount" required>
                <input class="form-text" type="text" id="account_desc" placeholder="description">

                <input type="button" class="btn btn-outline-secondary frm_button" value="Add" onclick="add_new_account()">
            </form>
            <div id="err_ms_id"></div>
        </fieldset>
    </div>
    <div id="list_container">
        <?php include "../controller/get_user_account_list.php" ?>
    </div>

</div> <!-- container-->
<?php include 'footer.php' ?>

</body>
</html>