

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
    <title>Overview</title>
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

    <?php include_once "head.inc.php"; ?>
    <link rel="stylesheet" href="css/morris.css">
    <script src="js/raphael.min.js"></script>
    <script src="js/morris.min.js"></script>
</head>
<body>
<?php include "header.php" ?>
<div id="container" class="container">
    <!--<h1>Main: Welcome --><?php //echo $userDetails->name; ?><!--</h1>-->
    <div>
        <h1>
            Overview::Welcome <?php
            if (!empty($_SESSION['user_name'])) {
                echo $_SESSION['user_name'] . " | id # " . $_SESSION['user_id'];
            }
            ?>
        </h1>
    </div>
    <div class="row">
        <?php include "../controller/get_user_all_transactions_uid.php"; ?>
    </div>
    <div class="row">
        <div class="box-body chart-responsive col-md-4">
            <div class="chart" id="sales-chart" style="height: 300px; position: relative;"></div>
        </div>

        <div class="box-body chart-responsive col-md-4">
            <div class="chart" id="bar-chart" style="height: 300px;"></div>
        </div>
    </div>




</div> <!-- container-->
<?php include 'footer.php' ?>

<script>
    $(function () {
        "use strict";

        //DONUT CHART
        var donut = new Morris.Donut({
            element: 'sales-chart',
            resize: true,
            colors: ["#3c8dbc", "#f56954", "#00a65a"],
            data: [
                {label: "Download Sales", value: 12},
                {label: "In-Store Sales", value: 30},
                {label: "Mail-Order Sales", value: 20}
            ],
            hideHover: 'auto'
        });
        //BAR CHART
        var bar = new Morris.Bar({
            element: 'bar-chart',
            resize: true,
            data: [
                {y: '2006', a: 100, b: 90},
                {y: '2007', a: 75, b: 65},
                {y: '2008', a: 50, b: 40},
                {y: '2009', a: 75, b: 65},
                {y: '2010', a: 50, b: 40},
                {y: '2011', a: 75, b: 65},
                {y: '2012', a: 100, b: 90}
            ],
            barColors: ['#00a65a', '#f56954'],
            xkey: 'y',
            ykeys: ['a', 'b'],
            labels: ['CPU', 'DISK'],
            hideHover: 'auto'
        });
    });
</script>
</body>
</html>