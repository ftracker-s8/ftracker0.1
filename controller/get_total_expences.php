<?php
if (session_status() == PHP_SESSION_NONE) {
session_start();
}

include "../model/Transaction.php";
include "../model/dao/TransactionDao.php";
include "../model/DBManager.php";

$uid = "";
if(isset($_SESSION['user_id'])) {
    $uid = $_SESSION['user_id'];
}

