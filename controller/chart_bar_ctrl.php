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

$sql_inc = "
SELECT m.monthn, IFNULL(SUM(t.amount),0) as incomer FROM months as m
LEFT JOIN transactions as t
ON DATE_FORMAT(t.date_time, '%c') = m.monthn AND exp_inc = 'inc'
AND user_id = ". $uid . "
GROUP BY m.monthn";
$pdo = \model\DBManager::getInstance()->getConnection();
$sql = "$sql_inc";
$stmt = $pdo->prepare($sql_inc);
$stmt->execute();
$incomer = $stmt->fetchAll(PDO::FETCH_ASSOC);

$data_inc = [];
foreach ($incomer as $row) {
    $data_inc[] = $row;
}
echo json_encode($data_inc);
