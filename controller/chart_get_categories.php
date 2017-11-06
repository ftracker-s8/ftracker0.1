<?php

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

//include "../model/Transaction.php";
//include "../model/dao/TransactionDao.php";
//include "../model/DBManager.php";

$uid = "";
$chart_data = '';
if (isset($_SESSION['user_id'])) {
    $uid = $_SESSION['user_id'];
}

$sql_inc = "
SELECT ca.category_id, ca.category_name, SUM(tr.amount) as category_total FROM categories as ca
RIGHT JOIN transactions as tr
ON ca.category_id = tr.category_id  
WHERE tr.user_id IN (0, $uid) AND exp_inc = 'exp' AND YEAR(date_time) = YEAR(CURDATE())
GROUP BY tr.category_id
";
$pdo = \model\DBManager::getInstance()->getConnection();
$sql = "$sql_inc";
$stmt = $pdo->prepare($sql_inc);
$stmt->execute();
$incomer = $stmt->fetchAll(PDO::FETCH_ASSOC);

$categories_exp_json_data = array();

if (!empty($incomer)) {
    foreach ($incomer as $rec) {
        $json_array['label'] = $rec['category_name'];
        $json_array['value'] = $rec['category_total'];
        array_push($categories_exp_json_data, $json_array);
    }
} else {
    $json_array['label'] = "Empty";
    $json_array['value'] = 0;
    array_push($categories_exp_json_data, $json_array);
}

