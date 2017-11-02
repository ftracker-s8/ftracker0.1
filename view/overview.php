<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
function __autoload($className)
{
    $className = '..\\' . $className;
    require_once str_replace("\\", "/", $className) . '.php';
}

$uid = "";
if (isset($_SESSION['user_id'])) {
    $uid = $_SESSION['user_id'];
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

    <script src="js/raphael212-min.js"></script>
    <script src="js/morris050.min.js"></script>
    <script src="js/moment-locales.js"></script>
    <script src="js/daterangepicker.js"></script>
    <link rel="stylesheet" href="css/daterangepicker.css">

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
        <?php
        $categories_exp_json_data = $incomes_cat_json_data = $categories_exp_json_data = "";
        include "../controller/chart_get_categories.php";
        include "../controller/chart_get_income_categories.php";


        ?>
        <div class="col-md-4">
            <div id="donut-categories" style="height: 250px;"></div>
            <div class="row text-center">2017 Expenses Categories</div>
        </div>
        <div class="col-md-4">
            <div id="donut-inc-acc" style="height: 250px;"></div>
            <div class="row text-center">2017 Incomes</div>
        </div>
        <div class="col-md-4">
            <div id="donut-exp-inc" style="height: 250px;">
                <?php include "../controller/chart_morris_exp_inc.php"; ?>
            </div>


            <div class="row text-center"><div id="date-picker-balance">
                    <input type="text" id="daterange1" name="daterange1" size="23" value="" onselect="balanceDataRangeUpdate(<?= uid ?>)" />
                </div>
                <br>
                2017 Balance</div>
        </div>
    </div>
<!--    <div class="col-md-12">-->
<!--        <div id="bar-chart" style="height: 250px;"></div>-->
<!--    </div>-->


    <script type="application/javascript">
        Morris.Donut({
            element: 'donut-categories',
            data: <?php echo json_encode($categories_exp_json_data)?>,
            backgroundColor: '#ccc',
            labelColor: '#f4b107',
            colors: [
                '#a4000d', '#20b532', '#f4cf0c', '#c626f4', '#f49238', '#4589d7'
            ]
        });
    </script>
    <script type="application/javascript">
        Morris.Donut({
            element: 'donut-inc-acc',
            data: <?php echo json_encode($incomes_cat_json_data)?>,
            backgroundColor: '#ccc',
            labelColor: '#f4b107',
            colors: [
                '#a4000d', '#20b532', '#f4cf0c', '#c626f4', '#f49238', '#4589d7'
            ]
        });
    </script>
    <script type="application/javascript">
        Morris.Donut({
            element: 'donut-exp-inc',
            data: <?php echo json_encode($inc_exp_q_json_data)?>,
            backgroundColor: '#ccc',
            labelColor: '#f4b107',
            colors: [
                '#13a400',
                '#8e0010'

            ]
        });
    </script>


    <script type="text/javascript">
        $('#daterange1').daterangepicker({
            "showDropdowns": true,
            "locale": {
                "format": "DD.MM.YYYY",
                "separator": " - ",
                "applyLabel": "Apply",
                "cancelLabel": "Cancel",
                "fromLabel": "From",
                "toLabel": "To",
                "customRangeLabel": "Custom",
                "weekLabel": "W",
                "daysOfWeek": [
                    "Su",
                    "Mo",
                    "Tu",
                    "We",
                    "Th",
                    "Fr",
                    "Sa"
                ],
                "monthNames": [
                    "January",
                    "February",
                    "March",
                    "April",
                    "May",
                    "June",
                    "July",
                    "August",
                    "September",
                    "October",
                    "November",
                    "December"
                ],
                "firstDay": 1
            },
            "parentEl": "test",
            //"startDate": "2017/01/27",
            "startDate": "27.01.2017",
            "endDate": "<?= date("d.m.Y") ?>"
        }, function (start, end, label) {
            console.log("New date range selected: ' + start.format('YYYY-MM-DD') + ' to ' + end.format('YYYY-MM-DD') + ' (predefined range: ' + label + ')");
        });
    </script>
</div> <!-- container-->
<?php include 'footer.php' ?>


</body>
</html>