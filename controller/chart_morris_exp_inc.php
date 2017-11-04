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

$uid = "";
$start_date = "01.01." . date("Y") ;
$end_date = date("d.m.Y") ;
//var_dump($start_date, $end_date);

$chart_data = '';
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

    $sql_inc_dp = "SELECT ROUND(SUM(amount),2) as sums_balance FROM transactions
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
    $bie_json_data = array();

//var_dump($inc_exp_q);

    $json_array1['label'] = ['incoms'];
    $json_array1['value'] = $inc_exp_q[0]['sums'];
    array_push($bie_json_data, $json_array1);
    $json_array1['label'] = ['expenses'];
    $json_array1['value'] = $inc_exp_q[1]['sums'];
    array_push($bie_json_data, $json_array1);

}
else {
    $sql_incd = "SELECT ROUND(SUM(amount),2) as sums_balance FROM transactions
WHERE user_id = $uid
AND DATE(date_time) BETWEEN STR_TO_DATE('2017/01/01', '%Y/%m/%d') AND STR_TO_DATE('2017/12/31', '%Y/%m/%d')
GROUP by exp_inc";
//AND DATE(date_time) BETWEEN STR_TO_DATE('2017/01/01', '%Y/%m/%d') AND STR_TO_DATE('2017/12/31', '%Y/%m/%d')

//$pdo = \model\DBManager::getInstance()->getConnection();
    $sql = "$sql_inc";
    $stmt = $pdo->prepare($sql_incd);
    $stmt->execute();
    $inc_exp_q = $stmt->fetchAll(PDO::FETCH_ASSOC);

//var_dump($inc_exp_q);
    $bie_json_data = array();

//var_dump($inc_exp_q);

    $json_array['label'] = ['incoms'];
    $json_array['value'] = $inc_exp_q[0]['sums_balance'];
    array_push($bie_json_data, $json_array);
    $json_array['label'] = ['expenses'];
    $json_array['value'] = $inc_exp_q[1]['sums_balance'];
    array_push($bie_json_data, $json_array);
}
?>