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
<!--    <script src="js/raphael.min.js"></script>-->
<!--    <script src="js/morris.min.js"></script>-->
    <script src="js/tracker.js"></script>
    <script src="js/ajaxAdk.js"></script>
    <script src="js/filters.js"></script>

    <script src="js/moment-locales.js"></script>
    <link rel="stylesheet" href="css/daterangepicker.css">
    <script src="js/daterangepicker.js"></script>

</head>
<body>
<?php include "header.php" ?>
<div id="modal-add">
    <div class="modal fade" id="modal-add-exp">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Add expense</h4>
                </div>
                <div class="modal-body" id="modala">

                    <?php include "includes/add_entry_form_modal.incl.php"; ?>

                    <!--                    <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>-->
                </div>
                <!-- <div class="modal-footer">
                    <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save changes</button>
                </div> -->
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
</div> <!-- /.modal -->

<div id="container" class="container">
    <div class="row">
        <div class="col-sm-8">

            <div class="nav-tabs-custom">
                <ul class="nav nav-tabs">

                    <li class="active"><a href="#tab_1" data-toggle="tab">
                            <p class="glyphicon glyphicon-th-list"></p> Inquiry
                        </a></li>
                    <li><a href="#tab_2" data-toggle="tab">
                            <p class="glyphicon glyphicon-cloud-download"></p> Add Expenses
                        </a>
                    </li>
                    <li><a href="#tab_3" data-toggle="tab">
                            <p class="glyphicon glyphicon-cloud-upload"></p> Add Income
                        </a>
                    </li>
                    <!-- <li class="dropdown">
                        <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                            Dropdown <span class="caret"></span>
                        </a>
                        <ul class="dropdown-menu">
                            <li role="presentation"><a role="menuitem" tabindex="-1" href="#">Action</a></li>
                            <li role="presentation"><a role="menuitem" tabindex="-1" href="#">Another action</a></li>
                            <li role="presentation"><a role="menuitem" tabindex="-1" href="#">Something else here</a></li>
                            <li role="presentation" class="divider"></li>
                            <li role="presentation"><a role="menuitem" tabindex="-1" href="#">Separated link</a></li>
                        </ul>
                    </li>
                    <li class="pull-right"><a href="#" class="text-muted"><i class="fa fa-gear"></i></a></li>-->
                </ul>
                <div class="tab-content">
                    <div class="tab-pane active" id="tab_1">
                        <div class="form-row filter border-thin">

                            <form class="form-group">
                                by date: <select class="form-inline input-lg" name="datef" id="datef"
                                                 onchange="filterEntries()">
                                    <option value="0" selected>Select date range:</option>
                                    <option value="1">Today</option>
                                    <option value="2">Yesterday</option>
                                    <!--                                        <option value="3">Last 7 days</option>-->
                                    <option value="3">This month</option>
                                    <option value="4">This Year</option>
                                    <option value="5">All</option>
                                </select>
                                <label for="entrytype" class="label">by type:
                                    <input type="radio" class="radio radio-inline" name="entrytype" id="entrytype"
                                           value="both"
                                           checked onclick="filterEntries()"> Both
                                    <input type="radio" class="radio radio-inline" name="entrytype" id="entrytype"
                                           value="exp"
                                           onclick="filterEntries()"> Expenses
                                    <input type="radio" class="radio radio-inline" name="entrytype" id="entrytype"
                                           value="inc"
                                           onclick="filterEntries()"> Incoms<br>
                                </label>
                            </form>


                        </div>

                        <div id="transactionslist">
                            <?php include "../controller/get_transactions_with_filters.php"; ?>
                        </div>
                    </div>
                    <div class="tab-pane" id="tab_2"> <!-- start TAB 1 -->

                        <?php include "includes/add_entry_form.incl.php"; ?>

                    </div> <!-- end TAB 1 -->
                    <!-- /.tab-pane -->
                    <div class="tab-pane" id="tab_3">

                        <?php include "includes/add_entry_income_form.incl.php"; ?>
                    </div>
                    <!-- /.tab-pane -->

                    <!-- /.tab-pane -->
                </div>
                <!-- /.tab-content -->
            </div>
            <!-- nav-tabs-custom -->

        </div> <!-- end col 1 -->

        <div class="col-sm-4" id="sidebar">
            <div class="panel panel-default">
                <?php include "../controller/get_user_account_totals_ammount.php"?>
                <div class="panel-heading
                    <?php
                    if ($result_total_ammount['total'] > 50) {
                        echo "balance balance-green-bg";
                    }
                    elseif ($result_total_ammount['total'] <= 0) {
                            echo "balance balance-red-bg";
                    }
                    elseif ($result_total_ammount['total'] > 0 && $result_total_ammount['total'] <100) {
                        echo "balance balance-orange-bg";
                    }
                ?>"
                >Balance: <strong><?php echo $result_total_ammount['total']; ?> $</strong>
                </div>
                <div class="panel-body">
                    <?php include "includes/show_user_accounts_avail.incl.php"; ?>
                </div>
            </div>
        </div><!--/.sidebar-offcanvas-->
        <!-- END CUSTOM TABS -->
    </div>
</div> <!-- container -->


<?php //include 'footer.php' ?>
<div class="bottom-but-area">
    <button type="button" class="btn-round-large btn-red" data-toggle="modal" data-target="#modal-add-exp">+</button>
    Add entry
</div>
<script>
    $('#entryd').daterangepicker({
        "singleDatePicker": true,
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
                "Su", "Mo", "Tu", "We", "Th", "Fr", "Sa"
            ],
            "monthNames": [
                "January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"
            ],
            "firstDay": 1
        },
        "linkedCalendars": false,
        "showCustomRangeLabel": false,
//        "startDate": "01.01.2017",
//        "endDate": "31.12.2017",
        "opens": "center"
    }, function(start, end, label) {
        console.log("New date range selected: ' + start.format('DD.MM.YYYY') + ' to ' + end.format('DD.MM.YYYY') + ' (predefined range: ' + label + ')");
    });
</script>
</body>
</html>
