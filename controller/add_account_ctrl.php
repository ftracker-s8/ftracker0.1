<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
//function __autoload($class)
//{
//    $class = "..\\" . $class;
//    require_once str_replace("\\", "/", $class) . ".php";
//}

use \model\Accounts;
use model\dao\AccountDao;

require_once "../model/DBManager.php";
$pdo = \model\DBManager::getInstance()->getConnection();
$owner_id = "";
$err_msga = [];

if (isset($_POST['account_name']) && $_POST['account_name'] != "" && isset($_POST['ammount'])) {
    $account_name = trim(htmlentities($_POST['account_name']));
    $ammount = trim(htmlentities($_POST['ammount']));
    $account_desc = trim(htmlentities($_POST['account_desc']));
    if(!empty($_SESSION['user_id'])) {
        $owner_id = $_SESSION['user_id'];
    }
    //TODO currency;

    try {
        $sql = "INSERT INTO accounts (account_name, ammount, account_desc, owner_id) VALUES (?,?,?,?)";
        $query = $pdo->prepare($sql);

        $query->execute(array($account_name, $ammount, $account_desc, $owner_id));
        $_SESSION['error-account'] = null;
    } catch (PDOException $e) {
        echo 'PDOException : ' . $e->getMessage();
    }
}
else {
    //echo "Empty fields not permited";
    //$err_msga =  "Empty fields are not permited";
    $_SESSION['error-account'] = "Empty fields are not permited";
}


// list_members : this file displays the list of members in a table view
include('error-msg.php');
include('get_user_account_list.php');