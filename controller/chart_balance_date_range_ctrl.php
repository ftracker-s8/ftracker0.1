<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

//include "../model/Transaction.php";
//include "../model/dao/TransactionDao.php";
include_once "../model/DBManager.php";

$date_range = $uid = "";
$pdo = \model\DBManager::getInstance()->getConnection();

if(isset($_POST['user_id'])) {
    $uid = test_input($_POST['user_id']);
    $date_range = test_input($_POST['balance_daterange']);

}
    var_dump($uid, $date_range);
    function test_input($data)
    {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    $arr_date = [];
    $arr_date = explode(' - ', $date_range);
//var_dump($arr_date);
    $start_date = $arr_date[0];
    $end_date = $arr_date[1];

//    $sql_inc_def = "
//SELECT DISTINCT
//(select ROUND(SUM(amount),2) FROM transactions WHERE exp_inc = 'inc' AND user_id = $uid
//AND DATE(date_time) = DATE_FORMAT('2017', '%Y')) as incoms,) as incoms,
//(select ROUND(SUM(amount),2) FROM transactions WHERE exp_inc = 'exp' AND user_id = $uid
//AND DATE_FORMAT(date_time, '%Y') = '2017') as expenses
//FROM transactions
//";
//    $sql = "$sql_inc";
//    $stmt = $pdo->prepare($sql_inc_def);
//    $stmt->execute();
//    $inc_exp_q = $stmt->fetchAll(PDO::FETCH_ASSOC);
//
////var_dump($inc_exp_q);
//    $inc_exp_q_json_data=array();
//
//    $json_array['label']=['incoms'];
//    $json_array['value']=$inc_exp_q[0]['incoms'];
//    array_push($inc_exp_q_json_data,$json_array);
//    $json_array['label']=['expenses'];
//    $json_array['value']=$inc_exp_q[0]['expenses'];
//    array_push($inc_exp_q_json_data,$json_array);
//
//else {
$sql_inc2 = "
SELECT DISTINCT
(select ROUND(SUM(amount),2) FROM transactions WHERE exp_inc = 'inc' AND user_id = $uid
AND DATE_FORMAT(date_time, '%Y') = '2017') as incoms,
(select ROUND(SUM(amount),2) FROM transactions WHERE exp_inc = 'exp' AND user_id = $uid
AND DATE_FORMAT(date_time, '%Y') = '2017') as expenses
FROM transactions
";
    //$pdo = \model\DBManager::getInstance()->getConnection();
    $sql = "$sql_inc2";
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
