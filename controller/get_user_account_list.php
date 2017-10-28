<?php
if(session_status() == PHP_SESSION_NONE) {
    session_start();
}
$owner_id = $_SESSION['user_id'];

include_once "../model/dao/AccountDao.php";
include_once "../model/Accounts.php";
//include "../model/DBManager.php";

use \model\Accounts;
use model\dao\AccountDao;
$oi = "";
if(isset($_SESSION["user_id"])) {
    $oi = $_SESSION["user_id"];
}
try {
    $result_accounts = AccountDao::getAInstance()->getUserAcountsList($oi);
}
catch(PDOException $e) {
    echo "acc list:: " . $e->getMessage();
}
?>
