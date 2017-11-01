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
$months_list = ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'];

$sql_inc = "
SELECT m.monthn, IFNULL(SUM(t.amount),0) as incomer FROM months as m
LEFT JOIN transactions as t
ON DATE_FORMAT(t.date_time, '%c') = m.monthn AND exp_inc = 'inc'
AND user_id = 26
GROUP BY m.monthn";
$pdo = \model\DBManager::getInstance()->getConnection();
$sql = "$sql_inc";
$stmt = $pdo->prepare($sql_inc);
$stmt->execute();
$incomer = $stmt->fetchAll(PDO::FETCH_ASSOC);

$sql_exp = "
SELECT m.monthn, IFNULL(SUM(t.amount),0) as expenser FROM months as m
LEFT JOIN transactions as t
ON DATE_FORMAT(t.date_time, '%c') = m.monthn AND exp_inc = 'exp'
AND user_id = 26
GROUP BY m.monthn";
$pdo = \model\DBManager::getInstance()->getConnection();
$sql = "$sql_exp";
$stmt = $pdo->prepare($sql_exp);
$stmt->execute();
$expenser = $stmt->fetchAll(PDO::FETCH_ASSOC);

$data_inc = [];
foreach ($incomer as $row) {
    $data_inc[] = $row;
}
var_dump($data_inc);

$data_exp = [];
foreach ($expenser as $row) {
    $data_exp[] = $row;
}
var_dump($data_inc). "<br>";
echo "trarala";
var_dump($data_exp);

//foreach ($incoms as $item) {
//
//}


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