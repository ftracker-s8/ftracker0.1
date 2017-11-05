<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

//include "../model/Transaction.php";
//include "../model/dao/TransactionDao.php";
include_once "../model/DBManager.php";
$pdo = \model\DBManager::getInstance()->getConnection();

$chart_data = '';
if (isset($_SESSION['user_id'])) {
    $uid = $_SESSION['user_id'];
}
$current_year = date("Y");

$sql_year_inc = "SELECT idm, IFNULL(SUM(t.amount),0) as incomsy FROM months
LEFT JOIN transactions as t
ON month(date_time) = idm AND exp_inc = 'inc' AND user_id = $uid AND YEAR(date_time) = $current_year
GROUP BY idm
";
$stmt = $pdo->prepare($sql_year_inc);
$stmt->execute();
$result_year_inc = $stmt->fetchAll(PDO::FETCH_ASSOC);

$sql_year_exp = "SELECT idm, IFNULL(SUM(t.amount),0) as expensesy FROM months
LEFT JOIN transactions as t
ON month(date_time) = idm AND exp_inc = 'exp' AND user_id = $uid AND YEAR(date_time) = $current_year
GROUP BY idm
";
$stmt = $pdo->prepare($sql_year_exp);
$stmt->execute();
$result_year_exp = $stmt->fetchAll(PDO::FETCH_ASSOC);

$new_arr_inc = [];
foreach ($result_year_inc as $key => $item) {
    $new_arr_inc[] = $item['incomsy'];
}
//$new_arr_inc = array_values($new_arr);
$integerIDs = array_map('intval', array_values($new_arr_inc));
$new_arr_inc = json_encode($integerIDs);


foreach ($result_year_exp as $key => $item) {
    $new_arr_exp[] = $item['expensesy'];
}
$integer_exp = array_map('intval', array_values($new_arr_exp));
$new_arr_exp = json_encode($integer_exp);

//echo $new_arr_inc;
//echo "<br>";
//echo $new_arr_exp;