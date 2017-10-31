<?php

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

include "../model/Transaction.php";
include "../model/dao/TransactionDao.php";
include "../model/DBManager.php";

$uid = "";
$chart_data = '';
if(isset($_SESSION['user_id'])) {
    $uid = $_SESSION['user_id'];
}

$sql3 = "
SELECT *, SUM(amount) as incsum FROM transactions WHERE user_id = 26 AND exp_inc = 'inc'
AND YEAR(date_time) = YEAR(NOW())
AND DATE(date_time) BETWEEN '2017-01-01' AND '2017-12-31'
GROUP BY month(date_time)
ORDER BY month(date_time);
";

$pdo = \model\DBManager::getInstance()->getConnection();
$sql = "$sql3";
$stmt = $pdo->prepare($sql3);
$stmt->execute();
$incoms = $stmt->fetchAll(PDO::FETCH_ASSOC);



//foreach ($incoms as $item) {
//
//}
print_r($chart_data);

?>

<!-- AREA CHART -->
<div class="box box-primary">
    <div class="box-header with-border">
        <h3 class="box-title">Area Chart</h3>

        <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
            </button>
            <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
        </div>
    </div>
    <div class="box-body">
        <div class="chart">
            <canvas id="areaChart" style="height:250px"></canvas>
        </div>
    </div>
    <!-- /.box-body -->
</div>
<!-- /.box -->

<!-- DONUT CHART -->
<div class="box box-danger">
    <div class="box-header with-border">
        <h3 class="box-title">Donut Chart</h3>

        <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
            </button>
            <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
        </div>
    </div>
    <div class="box-body">
        <canvas id="pieChart" style="height:250px"></canvas>
    </div>
    <!-- /.box-body -->
</div>
<!-- /.box -->