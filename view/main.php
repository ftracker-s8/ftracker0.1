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
    <script src="js/filters.js"></script>

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
                    <h4 class="modal-title">Default Modal</h4>
                </div>
                <div class="modal-body" id="modala">

                    <?php include "includes/add_expence_form.incl.php"; ?>

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
                    <li class="active"><a href="#tab_1" data-toggle="tab"><p
                                    class="glyphicon glyphicon-cloud-download"></p> Expenses</a></li>
                    <li><a href="#tab_2" data-toggle="tab"><p class="glyphicon glyphicon-cloud-upload"></p> Incoms</a>
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
                        <div class="">
                            <div class="col-auto filter border-thin">
                                <h4>Filter:</h4>
                                <!-- Date and time range -->
                                <form>
                                    by date: <select class="form-inline input-lg" name="users" onchange="filterDates(this.value)">
                                        <option value="">Select date range:</option>
                                        <option value="1">Today</option>
                                        <option value="2">Yesterday</option>
<!--                                        <option value="3">Last 7 days</option>-->
                                        <option value="3">This month</option>
                                        <option value="4">Last month</option>
                                        <option value="5">This year</option>
                                    </select>

                                </form>
                                <input type="radio" name="both" value="both" checked> Both<br>
                                <input type="radio" name="exp" value="exp"> ExpensesBoth<br>
                                <input type="radio" name="inc" value="inc"> Incoms<br>

                            </div>
                        </div>
                        <div id="transactionslist">
                            <?php include "../controller/get_transactions_with_filters.php"; ?>
                        </div>
                    </div>
                    <!-- /.tab-pane -->
                    <div class="tab-pane" id="tab_2">
                        The European languages are members of the same family. Their separate existence is a myth.
                        For science, music, sport, etc, Europe uses the same vocabulary. The languages only differ
                        in their grammar, their pronunciation and their most common words. Everyone realizes why a
                        new common language would be desirable: one could refuse to pay expensive translators. To
                        achieve this, it would be necessary to have uniform grammar, pronunciation and more common
                        words. If several languages coalesce, the grammar of the resulting language is more simple
                        and regular than that of the individual languages.
                    </div>
                    <!-- /.tab-pane -->
                    <!--                <div class="tab-pane" id="tab_3">
                                        Lorem Ipsum is simply dummy text of the printing and typesetting industry.
                                        Lorem Ipsum has been the industry's standard dummy text ever since the 1500s,
                                        when an unknown printer took a galley of type and scrambled it to make a type specimen book.
                                        It has survived not only five centuries, but also the leap into electronic typesetting,
                                        remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset
                                        sheets containing Lorem Ipsum passages, and more recently with desktop publishing software
                                        like Aldus PageMaker including versions of Lorem Ipsum.
                                    </div> -->
                    <!-- /.tab-pane -->
                </div>
                <!-- /.tab-content -->
            </div>
            <!-- nav-tabs-custom -->

        </div>
        <div class="col-sm-4" id="sidebar">
            <div class="panel panel-default">
                <div class="panel-heading">Statistics</div>
                <div class="panel-body">
                    Panel content
                </div>
            </div>
        </div><!--/.sidebar-offcanvas-->
        <!-- END CUSTOM TABS -->
    </div>
</div> <!-- container -->


<?php //include 'footer.php' ?>
<div class="bottom-but-area">
    <button type="button" class="btn-round-large btn-red" data-toggle="modal" data-target="#modal-add-exp">+</button>
    Add expense
</div>

</body>
</html>
