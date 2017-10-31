

<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
function __autoload($className) {
    $className = '..\\' . $className;
    require_once str_replace("\\", "/", $className) . '.php';
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
    <title>$8: Overview</title>
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

    <?php include_once "head.inc.php"; ?>
<!--    <script src="/view/js/Chart.min.js"></script>-->
    <script src="/view/js/Chart27.js"></script>
    <link rel="stylesheet" href="css/morris.css">
    <!-- <script src="js/raphael.min.js"></script>
    <script src="js/morris.min.js"></script> -->

</head>
<body>
<?php include "header.php" ?>
<div id="container" class="container">
    <!--<h1>Main: Welcome --><?php //echo $userDetails->name; ?><!--</h1>-->
    <div>
        <h1>
            Overview::Welcome <?php
            if (!empty($_SESSION['user_name'])) {
                echo $_SESSION['user_name'];
            }
            ?>
        </h1>
    </div>

    <div class="row">
        <?php include "includes/show_barchart_year.incl.php"; ?>
    </div>
    <!-- <div class="row">
        <div class="box-body chart-responsive col-md-4">
            <div class="chart" id="sales-chart" style="height: 300px; position: relative;"></div>
        </div>

        <div class="box-body chart-responsive col-md-4">
            <div class="chart" id="bar-chart" style="height: 300px;"></div>
        </div>
    </div> -->


</div> <!-- container-->
<?php include 'footer.php' ?>

<script src="js/jquery.min.js"></script>
<script src="js/chartapp.js"></script>
<script src="js/Chart27.js"></script>
</body>
</html>