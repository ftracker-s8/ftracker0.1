<?php

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

//include "../model/Transaction.php";
//include "../model/dao/TransactionDao.php";
//include "../model/DBManager.php";

$uid = "";
$chart_data = '';
if(isset($_SESSION['user_id'])) {
    $uid = $_SESSION['user_id'];
}

$sql_inc = "
SELECT DISTINCT
(select ROUND(SUM(amount),2) FROM transactions WHERE exp_inc = 'inc' AND user_id = 26
-- AND DATE_FORMAT(date_time, \"%Y/%m/%d\") = '2017') as incoms, 
AND DATE_FORMAT(date_time, '%Y') = '2017') as incoms, 
(select ROUND(SUM(amount),2) FROM transactions WHERE exp_inc = 'exp'
AND user_id = 26 AND DATE_FORMAT(date_time, '%Y') = '2017') as expenses
FROM transactions
";
$pdo = \model\DBManager::getInstance()->getConnection();
$sql = "$sql_inc";
$stmt = $pdo->prepare($sql_inc);
$stmt->execute();
$inc_exp_q = $stmt->fetchAll(PDO::FETCH_ASSOC);

//var_dump($inc_exp_q);
$inc_exp_q_json_data=array();

$json_array['label']=['incoms'];
$json_array['value']=$inc_exp_q[0]['incoms'];
array_push($inc_exp_q_json_data,$json_array);
$json_array['label']=['expenses'];
$json_array['value']=$inc_exp_q[0]['expenses'];
array_push($inc_exp_q_json_data,$json_array);
//var_dump($inc_exp_q_json_data);

?>