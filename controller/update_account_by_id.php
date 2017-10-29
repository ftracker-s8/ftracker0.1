<?php
/**
 * Created by PhpStorm.
 * User: assen.kovachev
 */
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
include "../model/DBManager.php";
$pdo = \model\DBManager::getInstance()->getConnection();
//var_dump($_POST['account_id']);
//var_dump($_POST['account_name_update']);
//var_dump($_POST['ammount_update']);
//var_dump($_POST['account_desc_update']);
if(isset($_POST['account_name_update']) && $_POST['account_name_update'] != "" && isset($_POST['ammount_update'])) {
    $account_id = trim(htmlentities($_POST['account_id']));
    $account_name = trim(htmlentities($_POST['account_name_update']));
    $ammount = trim(htmlentities($_POST['ammount_update']));
    $account_desc = trim(htmlentities($_POST['account_desc_update']));
    if(!empty($_SESSION['user_id'])) {
        $owner_id = $_SESSION['user_id'];
    }
    //TODO currency;

    try {
        $sql = "UPDATE accounts SET account_name = ?, ammount = ?, account_desc = ? WHERE account_id = ?";
        $query = $pdo->prepare($sql);

        $query->execute(array($account_name, $ammount, $account_desc, $account_id));
        $_SESSION['error-account'] = null;
        include_once "../view/includes/show_user_accounts_list.incl.php";
    } catch (PDOException $e) {
        echo 'PDOException : ' . $e->getMessage();
        //trow: new PDOException();
    }
}
else {
    //echo "Empty fields not permited";
    //$err_msga =  "Empty fields are not permited";
    $_SESSION['error-account'] = "Empty fields are not permited";
}

?>

<div id="list_container">
        <?php include "../controller/get_user_account_list.php" ?>
</div>