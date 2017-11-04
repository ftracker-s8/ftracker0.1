<?php

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

//include "../model/Transaction.php";
//include "../model/dao/TransactionDao.php";
include_once "../model/DBManager.php";
function test_input($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

$uid = $start_date = $end_date = "";
$start_date = "01.01." . date("Y") ;
$end_date = date("d.m.Y") ;
var_dump($start_date, $end_date);
$chart_data = '';
if (isset($_SESSION['user_id'])) {
    $uid = $_SESSION['user_id'];
}

if (isset($_POST['balance_daterange'])) {
    $temp_range = test_input($_POST['balance_daterange']);
    $arr_date = [];
    $arr_date = explode(' - ', $temp_range);
    var_dump($temp_range);
    $start_date = $arr_date[0];

    $end_date = $arr_date[1];
    var_dump($start_date, $end_date);
}
