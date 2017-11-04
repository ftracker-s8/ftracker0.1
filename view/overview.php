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
        $categories_exp_json_data = $incomes_cat_json_data = $categories_exp_json_data = $bie_json_data = "";
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

                <!--                --><?php //include "test.php"; ?>
            </div>
            <div class="row text-center">
                <div id="date-picker-balance">
                    <input type="text" id="daterange1" name="daterange1" size="23" value=""
                           onselect="balanceDataRangeUpdate('../../controller/chart_morris_exp_inc.php',<?= $uid ?>,'donut-exp-inc','daterange1')"/>
                </div>
                <br>
                2017 Balance
            </div>
        </div>
    </div>
</div>
<!--    <div class="col-md-12">-->
<!--        <div id="bar-chart" style="height: 250px;"></div>-->
<!--    </div>-->
<div class="container">
    <div class="box box-success">
        <div class="box-header with-border">
            <h3 class="box-title">Bar Chart</h3>

            <div class="box-body">
                <div class="chart">
                    <canvas id="barChart" style="height:230px"></canvas>
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
        data: <?php echo json_encode($bie_json_data)?>,
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
        "opens": "left",
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

<script>
    $(document).ready(function () {
        $.datepicker.setDefaults({
            dateFormat: 'yy-mm-dd'
        });
        $(function () {
            $("#from_date").datepicker();
            $("#to_date").datepicker();
        });
        $('#filter').click(function () {
            var from_date = $('#from_date').val();
            var to_date = $('#to_date').val();
            if (from_date != '' && to_date != '') {
                $.ajax({
                    url: "filter.php",
                    method: "POST",
                    data: {from_date: from_date, to_date: to_date},
                    success: function (data) {
                        $('#year_report').html(data);
                    }
                });
            }
            else {
                alert("Please Select Date");
            }
        });
    });
</script>

<script>
    //BAR CHART
    $(function () {
        window.m = Morris.Bar({
            //var bar = new Morris.Bar({
            element: 'bar-example',
            resize: true,
            data: [
                {year: '2006', a: 100, b: 90},
                {y: '2007', a: 75, b: 65},
                {y: '2008', a: 50, b: 40},
                {y: '2009', a: 75, b: 65},
                {y: '2010', a: 50, b: 40},
                {y: '2011', a: 75, b: 65},
                {y: '2012', a: 100, b: 90}
            ],
            barColors: ['#00a65a', '#f56954'],
            xkey: 'year',
            ykeys: ['a', 'b'],
            labels: ['CPU', 'DISK'],
            hideHover: 'auto'

        });
        $(window).on("resize", function () {
            m.redraw();
        });
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
                    fillColor           : 'rgba(210, 214, 222, 1)',
                    strokeColor         : 'rgba(210, 214, 222, 1)',
                    pointColor          : 'rgba(210, 214, 222, 1)',
                    pointStrokeColor    : '#c1c7d1',
                    pointHighlightFill  : '#fff',
                    pointHighlightStroke: 'rgba(220,220,220,1)',
                    data                : []
                },
                {
                    label               : 'Incoms',
                    fillColor           : 'rgba(60,141,188,0.9)',
                    strokeColor         : 'rgba(60,141,188,0.8)',
                    pointColor          : '#3b8bba',
                    pointStrokeColor    : 'rgba(60,141,188,1)',
                    pointHighlightFill  : '#fff',
                    pointHighlightStroke: 'rgba(60,141,188,1)',
//                    data                : [28, 48, 40, 19, 86, 27, 90]
                    data                : [<?= $result_year_inc ?>]
                }
            ]
        }
        //-------------
        //- BAR CHART -
        //-------------
        var barChartCanvas                   = $('#barChart').get(0).getContext('2d')
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
            scaleGridLineColor      : 'rgba(0,0,0,.05)',
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
            maintainAspectRatio     : true
        }

        barChartOptions.datasetFill = false
        barChart.Bar(barChartData, barChartOptions)
    })
</script>
<div style="clear:both;"></div>
<?php include 'footer.php' ?>


</body>
</html>