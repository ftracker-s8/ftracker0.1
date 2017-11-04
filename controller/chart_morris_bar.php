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
$sql_year_inc = "SELECT idm, IFNULL(SUM(t.amount),0) as incomsy FROM months
LEFT JOIN transactions as t
ON month(date_time) = idm AND exp_inc = 'inc' AND user_id = 26 AND YEAR(date_time) = 2017
GROUP BY idm
";
$stmt = $pdo->prepare($sql_year_inc);
$stmt->execute();
$result_year_inc = $stmt->fetchAll(PDO::FETCH_ASSOC);

$sql_year_exp = "SELECT idm, IFNULL(SUM(t.amount),0) as expensesy FROM months
LEFT JOIN transactions as t
ON month(date_time) = idm AND exp_inc = 'exp' AND user_id = 26 AND YEAR(date_time) = 2017
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

var_dump($new_arr_inc);
//$new_arr_decode = json_decode($new_arr);

echo "<br>";
//var_dump($result_year_exp) . PHP_EOL;
//echo "tarara <br>";
//var_dump($result_year_inc) . PHP_EOL;
var_dump($new_arr_exp);