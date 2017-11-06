<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

//include "../model/Transaction.php";
//include "../model/dao/TransactionDao.php";
include "../model/DBManager.php";
$pdo = \model\DBManager::getInstance()->getConnection();

$uid = "";
$chart_data = '';
if (isset($_SESSION['user_id'])) {
    $uid = $_SESSION['user_id'];
}

$sql1 = "SELECT * FROM transactions
WHERE exp_inc = 'exp' AND recurent_bill = 1;";

$stmt = $pdo->prepare($sql1);
$stmt->execute();
$result_recurrent_exp = $stmt->fetchAll(PDO::FETCH_ASSOC);

try {
$pdo->beginTransaction();
$sql_p1 = "INSERT INTO transactions (account_id, amount, exp_inc, category_id, `description`, recurent_bill, user_id, next_update)
VALUES (45, 15, 'exp', 2, 'recurent payment', 1, 1, '2017-11-06');";
$stmt = $pdo->prepare($sql_p1);
$stmt->execute();

$sql_p2 = "UPDATE accounts SET ammount = (ammount - 15) WHERE account_id = 45";
$stmt = $pdo->prepare($sql_p2);
$stmt->execute();

$sql_p3 = "UPDATE transactions SET recurent_bill = 2 WHERE transaction_id = 58";
$stmt = $pdo->prepare($sql_p3);
$stmt->execute();
$pdo->commit();
}
catch (PDOException $e) {
    $pdo->rollBack();
    echo "cron exp" . $e->getMessage();
}

var_dump($result_recurrent_exp);

echo "<br>";
echo count($result_recurrent_exp). "<br>". PHP_EOL;
foreach ($result_recurrent_exp as $key => $item) {
    echo $key . " - " . $key[$item]['date_time']."<br>". PHP_EOL;
}

