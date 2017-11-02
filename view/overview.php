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
    <link rel="stylesheet" href="css/morris.css">
    <!--    <script src="js/raphael.min.js"></script>-->
    <!--    <script src="js/morris.min.js"></script>-->
    <!--    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.css">-->
<!--    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.0/jquery.min.js"></script>-->
    <!--    <script src="//cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>-->
    <!--    <script src="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.min.js"></script>-->
    <script src="js/raphael212-min.js"></script>
    <script src="js/morris050.min.js"></script>

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
        $categories_exp_json_data = $incomes_cat_json_data = "";
        include "../controller/chart_get_categories.php";
        include "../controller/chart_get_income_categories.php";
        include "../controller/chart_morris_exp_inc.php";

        ?>
        <div class="col-md-4">
            <div id="donut-categories" style="height: 250px;"></div>
            <div>2017 Expenses Categories</div>
        </div>
        <div class="col-md-4">
            <div id="donut-inc-acc" style="height: 250px;"></div>
            <div class="">2017 Incomes</div>
        </div>
        <div class="col-md-4">
            <div id="donut-exp-inc" style="height: 250px;"></div>
        </div>
    </div>
    <div class="col-md-12">
        <div id="donut-inc-acc" style="height: 250px;"></div>
    </div>


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


</div> <!-- container-->
<?php include 'footer.php' ?>


</body>
</html>