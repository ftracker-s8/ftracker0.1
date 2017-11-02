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
SELECT ca.category_id, ca.category_name, SUM(tr.amount) AS category_total FROM categories AS ca
RIGHT JOIN transactions AS tr
ON ca.category_id = tr.category_id
WHERE tr.user_id IN (0, 26) AND exp_inc = 'exp'
GROUP BY tr.category_id
";
$pdo = \model\DBManager::getInstance()->getConnection();
$sql = "$sql_inc";
$stmt = $pdo->prepare($sql_inc);
$stmt->execute();
$incomer = $stmt->fetchAll(PDO::FETCH_ASSOC);

$data = array();
//    while($row = $incomer)
//    {
//        $data[] = array(
//            'label'  => $row["framework"],
//            'value'  => $row["no_of_like"]
//        );
//    }
foreach ($incomer as $row) {
    $data[] = array(
        'label' => $row["category_name"],
        'value' => $row["ammounts"]
    );
}
$data = json_encode($data);
echo $data;

?>