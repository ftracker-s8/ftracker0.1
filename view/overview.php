<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
function __autoload($className)
{
    $className = '..\\' . $className;
    require_once str_replace("\\", "/", $className) . '.php';
}

$uid = $new_arr_exp = $new_arr_inc = "";
if (isset($_SESSION['user_id'])) {
    $uid = $_SESSION['user_id'];
}

include('../model/config.php');
include "../model/userClass.php";
//include('../controller/session.php');
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
    <script src="/view/js/Chart.min.js"></script>
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
        $categories_exp_json_data = $incomes_cat_json_data = $categories_exp_json_data = $bie_json_data = "";
        include "../controller/chart_get_categories.php";
        include "../controller/chart_get_income_categories.php";


        ?>
        <div class="col-md-4">
            <div id="donut-categories" style="height: 250px;"></div>
            <div class="row text-center"><?= date('Y') ?> Expenses Categories</div>
        </div>
        <div class="col-md-4">
            <div id="donut-inc-acc" style="height: 250px;"></div>
            <div class="row text-center"><?= date('Y') ?> Incomes</div>
        </div>
        <div class="col-md-4">
            <div id="donut-exp-inc" style="height: 250px;">
                <?php include "../controller/chart_morris_exp_inc.php"; ?>

            </div>
            <div class="row text-center"><?= date('Y') ?> Balance</div>
        </div>
    </div>
</div>

<div class="container">
    <div class="box box-success">
        <div class="box-header with-border">
            <h3 class="box-title">Year <?= date('Y') ?> report</h3>
            <div class="box-body">
                <div class="chart">
                    <canvas id="bardChart" style="position: relative; height:40vh; width:80vw"></canvas>
                    <?php include "../controller/chart_morris_bar.php"; ?>
                </div>
            </div>
            <!-- /.box-body -->
        </div>
    </div>
    <!-- /.box -->
</div>


<script type="application/javascript">
    Morris.Donut({
        element: 'donut-categories',
        formatter: function (y, data) {
            if (y <= 0) {
                return 'still empty' }
            else {return '$' + y}
        },
        data: <?php echo json_encode($categories_exp_json_data)?>,
        backgroundColor: '#ccc',
        labelColor: '#f4b107',
        colors: [
            '#757575', '#a4000d', '#20b532', '#f4cf0c', '#c626f4', '#f49238', '#4589d7'
        ]
    });
</script>
<script type="application/javascript">
    Morris.Donut({
        element: 'donut-inc-acc',
        formatter: function (y, data) {
            if (y <= 0) {
                return 'still empty' }
            else {return '$' + y}
        },
        data: <?php echo json_encode($incomes_cat_json_data)?>,
        backgroundColor: '#ccc',
        labelColor: '#f4b107',
        colors: [
            '#757575', '#a4000d', '#20b532', '#f4cf0c', '#c626f4', '#f49238', '#4589d7'
        ]
    });
</script>
<script type="application/javascript">
    Morris.Donut({
        element: 'donut-exp-inc',
        formatter: function (y, data) {
            if (y <= 0) {
                return 'still empty' }
            else {return '$' + y}
        },
        data: <?php echo json_encode($bie_json_data)?>,
        backgroundColor: '#ccc',
        labelColor: '#f4b107',
        colors: [
            '#13a400',
            '#8e0010'

        ]
    });
</script>

<script>
    $(function () {
        /* ChartJS
         * -------
         * Here we will create a few charts using ChartJS
         */
        var areaChartData = {
            labels  : ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'Novemeber', 'December'],
            datasets: [
                {
                    label               : 'Expenses',
                    fillColor           : 'rgba(144, 18, 18, 1)',
                    //fillColor           : 'rgba(210, 214, 222, 1)',
                    strokeColor         : 'rgba(144, 18, 18, 1)',
                    pointColor          : 'rgba(144, 18, 18, 1)',
                    pointStrokeColor    : '#c1c7d1',
                    pointHighlightFill  : '#fff',
                    pointHighlightStroke: 'rgba(220,220,220,1)',
                    scaleOverride: true,
                    scaleSteps: 5,
                    data                : <?php echo $new_arr_exp ?>

                },
                {
                    label               : 'Incoms',
                    fillColor           : 'rgba(60,141,188,0.9)',
                    strokeColor         : 'rgba(60,141,188,0.8)',
                    pointColor          : '#3b8bba',
                    pointStrokeColor    : 'rgba(60,141,188,1)',
                    pointHighlightFill  : '#fff',
                    pointHighlightStroke: 'rgba(60,141,188,1)',
                    scaleOverride: true,
                    scaleSteps: 5,
                    data                : <?php echo $new_arr_inc ?>

                }
            ]
        }
        //-------------
        //- BAR CHART -
        //-------------
        var barChartCanvas                   = $('#bardChart').get(0).getContext('2d')
        var barChart                         = new Chart(barChartCanvas)
        var barChartData                     = areaChartData
        barChartData.datasets[1].fillColor   = '#00a65a'
        barChartData.datasets[1].strokeColor = '#00a65a'
        barChartData.datasets[1].pointColor  = '#00a65a'
        var barChartOptions                  = {
            //Boolean - Whether the scale should start at zero, or an order of magnitude down from the lowest value
            scaleBeginAtZero        : true,
            //Boolean - Whether grid lines are shown across the chart
            scaleShowGridLines      : true,
            //String - Colour of the grid lines
            scaleGridLineColor      : 'rgba(255,255,255,.05)',
            //Number - Width of the grid lines
            scaleGridLineWidth      : 1,
            //Boolean - Whether to show horizontal lines (except X axis)
            scaleShowHorizontalLines: true,
            //Boolean - Whether to show vertical lines (except Y axis)
            scaleShowVerticalLines  : true,
            //Boolean - If there is a stroke on each bar
            barShowStroke           : true,
            //Number - Pixel width of the bar stroke
            barStrokeWidth          : 2,
            //Number - Spacing between each of the X value sets
            barValueSpacing         : 5,
            //Number - Spacing between data sets within X values
            barDatasetSpacing       : 1,
            //String - A legend template
            legendTemplate          : '<ul class="<%=name.toLowerCase()%>-legend"><% for (var i=0; i<datasets.length; i++){%><li><span style="background-color:<%=datasets[i].fillColor%>"></span><%if(datasets[i].label){%><%=datasets[i].label%><%}%></li><%}%></ul>',
            //Boolean - whether to make the chart responsive
            responsive              : true,
            maintainAspectRatio     : false,
            scaleOverride:true,
            scaleSteps:5,
            scaleStartValue:0,
            scaleStepWidth:100
        }

        barChartOptions.datasetFill = false
        barChart.Bar(barChartData, barChartOptions)
    })
</script>

<div style="clear:both;"></div>
<?php include 'footer.php' ?>


</body>
</html>