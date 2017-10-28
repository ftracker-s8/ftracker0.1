<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

include "../model/DBManager.php";

$month = date("F");
if (isset($_GET['page'])) {
    $page = $_GET['page'];
} else {
    $page = 0;
}
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>$8: Expenses</title>
    <?php include_once "head.inc.php"; ?>
    <script src="js/raphael.min.js"></script>
    <script src="js/morris.min.js"></script>
    <script src="js/tracker.js"></script>
    <script src="js/ajaxAdk.js"></script>
</head>
<body>
<?php include "header.php" ?>
<div id="container" class="container">
    <h1>Monthly reports</h1>
    <div class="row">
        <div class="col-lg-12">
            <?php
            include '../model/calendar.php';
            $calendar = new Calendar();
            $tada = $calendar->showNavOnly();
            echo $tada;
            //    var_dump($tada)
            ?>

        </div>
    </div>

    <div style="clear: both"></div>
    <div class="row">
        <div class="col-lg-12">
            <div class="col-sm-4">
                <div class="panel panel-danger">
                    <div>
                        <?php include "includes/add_expence_form.incl.php"; ?>
                    </div>
                    <div>
                        <?php include "../controller/get_user_all_transactions_uid_ctrl.php"; ?>


                    </div>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="panel panel-danger">
                    <div>
                        Addincom
                    </div>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="panel panel-danger">
                    <div>
                        Balance
                    </div>
                </div>
                <div>
                    ** FILTER **
                </div>
            </div>
        </div>
    </div>


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

</div> <!-- container -->
<div id="bottom-buttons">
<?php include_once "includes/transaction_buttons.php"; ?>
</div>
<?php include 'footer.php' ?>

</body>
</html>
