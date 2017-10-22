<?php

if(session_status() == PHP_SESSION_NONE) {
    session_start();
}

use \model\Accounts;
use model\dao\AccountDao;

$owner_id = $_SESSION['user_id'];
$oi = new Accounts($owner_id);

$result = AccountDao::getAInstance()->getUserTotalAmmount($oi);
echo $result['total'];