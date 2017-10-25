<?php

if(session_status() == PHP_SESSION_NONE) {
    session_start();
}

use \model\Accounts;
use model\dao\AccountDao;

//$owner_id = $_SESSION['user_id'];
//$account_id = "";
//
//if(isset($_POST['account_id']))
//    $account_id = htmlentities($_POST['account_id']);
//
//$aid = new Accounts($account_id);
//
////$result = AccountDao::getAInstance()->getUserTotalAmmount($oi);
//$row = AccountDao::getAInstance()->getUserAccountById($aid);
//echo $result['total'];

include "../model/DBManager.php";
$result = "";
if(isset($_POST["id-submit"]))
{
    try {
        $output = '';
        $pdo = \model\DBManager::getInstance()->getConnection();
        //$query = "SELECT * FROM accounts WHERE account_id = '" . $_POST["account_id"] . "'";
        $query = "SELECT * FROM accounts WHERE account_id = '" . $_POST["id-submit"] . "'";
        $stm = $pdo->prepare($query);
        $stm->execute();
        $result = $stm->fetch(\PDO::FETCH_ASSOC);

        //echo "<h1>account name: " . $result['account_name'] . "</h1>";

        //echo "test: " . $_POST["test"];
    }
    catch (PDOException $e) {
        echo "aaaa" . $e->getMessage();
        trow: new PDOException();
    }
}
include "../view/includes/get_account_by_id_inmodal.php";
?>

