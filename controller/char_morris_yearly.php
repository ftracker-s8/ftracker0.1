<?php

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

include_once "../model/Transaction.php";
include_once "../model/dao/TransactionDao.php";
include_once "../model/DBManager.php";

$uid = "";
$chart_data = '';
if(isset($_SESSION['user_id'])) {
    $uid = $_SESSION['user_id'];
}

$sql_inc = "
SELECT m.monthn as months, IFNULL(SUM(t.amount),0) as year_inc FROM months as m
LEFT JOIN transactions as t
ON DATE_FORMAT(t.date_time, \"%c\") = m.monthn AND exp_inc = 'inc'
AND user_id = $uid
GROUP BY m.monthn

";
$pdo = \model\DBManager::getInstance()->getConnection();
$sql = "$sql_inc";
$stmt = $pdo->prepare($sql_inc);
$stmt->execute();
$year_incs = $stmt->fetchAll(PDO::FETCH_ASSOC);

$year_incs_json_data=array();

foreach($year_incs as $rec)
{
    $json_array['label']=$rec['months'];
    $json_array['value']=$rec['year_inc'];
    array_push($year_incs_json_data,$json_array);
}
//var_dump($year_incs_json_data);
?>