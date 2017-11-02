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
SELECT ca.category_id, ca.category_name, SUM(tr.amount) as category_total FROM categories as ca
RIGHT JOIN transactions as tr
ON ca.category_id = tr.category_id
WHERE tr.user_id IN (0, $uid) AND exp_inc = 'inc'
GROUP BY tr.category_id
";
$pdo = \model\DBManager::getInstance()->getConnection();
$sql = "$sql_inc";
$stmt = $pdo->prepare($sql_inc);
$stmt->execute();
$income_cat = $stmt->fetchAll(PDO::FETCH_ASSOC);

$incomes_cat_json_data=array();

foreach($income_cat as $rec)
{
    $json_array['label']=$rec['category_name'];
    $json_array['value']=$rec['category_total'];
    array_push($incomes_cat_json_data,$json_array);
}

?>