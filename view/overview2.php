<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
function __autoload($className)
{
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
<!--    <link rel="stylesheet" href="css/morris.css">-->
    <!--    <script src="js/raphael.min.js"></script>-->
    <!--    <script src="js/morris.min.js"></script>-->
    <!--    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.css">-->
    <!--    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.0/jquery.min.js"></script>-->
    <!--    <script src="//cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>-->
    <!--    <script src="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.min.js"></script>-->
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
            Overview :: Welcome <?php
            if (!empty($_SESSION['user_name'])) {
                echo $_SESSION['user_name'];
            }
            ?>
        </h1>
    </div>

    <div class="row">

<!--        <input type="text" name="daterange" value="01/01/2015 - 01/31/2015" />-->
        <div class="col col-sm-6">
            <div id="demo"></div>
        <input type="text" id="daterange1" name="daterange1" value="2017/01/01 - 2017/10/01" />
        </div>
        <script type="text/javascript">
$('#daterange1').daterangepicker({
    "showDropdowns": true,
    "locale": {
        "format": "YYYY/MM/DD",
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
    "startDate": "2017/01/27",
    "endDate": "<?= date("Y/m/d") ?>"
}, function(start, end, label) {
    console.log("New date range selected: ' + start.format('YYYY-MM-DD') + ' to ' + end.format('YYYY-MM-DD') + ' (predefined range: ' + label + ')");
});
        </script>
<!--        --><?php
//        $categories_exp_json_data = $incomes_cat_json_data = "";
//        include "../controller/char_morris_yearly.php";
//        ?>

    </div> <!-- container-->
    <?php include 'footer.php' ?>


</body>
</html>