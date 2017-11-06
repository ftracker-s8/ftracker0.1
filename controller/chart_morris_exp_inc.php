<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
//include "../model/Transaction.php";
//include "../model/dao/TransactionDao.php";
include_once "../model/DBManager.php";
//function test_input($data)
//{
//    $data = trim($data);
//    $data = stripslashes($data);
//    $data = htmlspecialchars($data);
//    return $data;
//}
$uid = $start_date = $end_date = "";

//var_dump($start_date, $end_date);
$chart_data = '';
function test_input($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

if (isset($_SESSION['user_id'])) {
    $uid = $_SESSION['user_id'];
}
if (isset($_POST['balancedaterange'])) {
    $temp_range = test_input($_POST['balancedaterange']);
    $arr_date = [];
    $arr_date = explode(' - ', $temp_range);
    //var_dump($temp_range);
    $start_date = $arr_date[0];
    $end_date = $arr_date[1];
    //var_dump($start_date, $end_date);
} else {
//    $start_date = '01.01.2017';
//    $end_date = '31.12.2017';
    $start_date = "01.01." . date("Y");
    $end_date = date("d.m.Y");
}
//var_dump($start_date, $end_date);

$sql_inc_dp = "SELECT exp_inc, ROUND(SUM(amount),2) as sums_balance FROM transactions
WHERE user_id = $uid
AND DATE(date_time) BETWEEN STR_TO_DATE('$start_date', '%d.%m.%Y') AND STR_TO_DATE('$end_date', '%d.%m.%Y')
GROUP by exp_inc";
//AND DATE(date_time) BETWEEN STR_TO_DATE('2017/01/01', '%Y/%m/%d') AND STR_TO_DATE('2017/12/31', '%Y/%m/%d')
//$pdo = \model\DBManager::getInstance()->getConnection();
$sql = "$sql_inc";
$stmt = $pdo->prepare($sql_inc_dp);
$stmt->execute();
$inc_exp_q = $stmt->fetchAll(PDO::FETCH_ASSOC);

//var_dump($inc_exp_q);
//echo "<br>";

$bie_json_data = array();
//var_dump($inc_exp_q);

if (!empty($inc_exp_q)) {
    $json_array1['label'] = ['incoms'];
    if (array_key_exists('0', $inc_exp_q)) {
        $json_array1['value'] = doubleval($inc_exp_q[0]['sums_balance']);
    } else {
        $json_array1['value'] = 0;
    }
    array_push($bie_json_data, $json_array1);

    //var_dump(doubleval($inc_exp_q[1]));

    $json_array1['label'] = ['expenses'];
    //if ($inc_exp_q[1]['sums_balance'] != null) {
    if (array_key_exists('1', $inc_exp_q)) {
        $json_array1['value'] = $inc_exp_q[1]['sums_balance'];
    } else {
        $json_array1['value'] = 0;
    }

    //$json_array1['value'] = intval($inc_exp_q[1]['sums_balance']);
    array_push($bie_json_data, $json_array1);
    //var_dump($bie_json_data);
} //var_dump($bie_json_data);
else {
    $json_array['label'] = ['incoms'];
    $json_array['value'] = 0;
    array_push($bie_json_data, $json_array);
    $json_array['label'] = ['expenses'];
    $json_array['value'] = 0;
    array_push($bie_json_data, $json_array);
}
