<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

use model\Transaction;
use model\dao\TransactionDao;
//include "../model/DBManager.php";
include "../model/Transaction.php";
include "../model/dao/TransactionDao.php";

if(isset($_SESSION['user_id'])) {
    try {
    $user_id = $_SESSION["user_id"];
        //var_dump($user_id).PHP_EOL;

    $uid = new Transaction($user_id);

    $resulta = TransactionDao::getTransactionInstance()->getAllTransactionsByUid($user_id);

    include "../view/includes/get_user_transactions_by_uid.incl.php";

    }
    catch (PDOException $e) {
        echo "Err all transactions>> " . $e->getMessage();
    }
}
else {
    echo "AH BEDA";
}
