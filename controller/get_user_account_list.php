<?php
if(session_status() == PHP_SESSION_NONE) {
    session_start();
}
function __autoload ( $class ){
    $class = "..\\" . $class;
    require_once str_replace("\\", "/", $class) .".php";
}

use \model\Accounts;
use model\dao\AccountDao;

$owner_id = $_SESSION['user_id'];

$oi = new Accounts($owner_id);
try {
    $result = AccountDao::getAInstance()->getUserAcountsList($oi);
    //print_r($account_list->getAccountName());
    print_r($result);
}
catch (PDOException $e) {
    echo "Err accounts list: " . $e->getMessage();
}