<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

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
    <?php
//    include '../model/calendar.php';
//    $calendar = new Calendar();
//    echo $calendar->showNavOnly();
    ?>
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
    <footer>
        <p>&copy; Company 2017</p>
        <?php include 'footer.php' ?>
    </footer>
</div> <!-- container -->
</body>
</html>