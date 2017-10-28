<?php
/**
 * Created by PhpStorm.
 * User: assen.kovachev
 * Date: 21.10.2017 г.
 * Time: 14:12 ч.
 */
include "../model/DBManager.php";
$pdo = \model\DBManager::getInstance()->getConnection();
$account_for_delete = null;
if(isset($_POST['account_id'])) {
    $account_for_delete = trim(htmlentities($_POST['account_id']));
}

// deleting a member using PDO with try/catch to escape the exceptions
try {
    //$sql = "DELETE FROM members WHERE id = :id";
    //$sql = "UPDATE members SET visibility='0' WHERE id = :id";
    $sql = "DELETE FROM accounts WHERE account_id = ?" ;
    $query = $pdo->prepare($sql);
    //$query->bindParam(':id', $_POST['account_id'], PDO::PARAM_INT);
    $query->execute(array($account_for_delete));

} catch (PDOException $e) {
    echo 'PDOException : '.  $e->getMessage();
}

// list_members : this file displays the list of members in a table view
include('../view/includes/show_user_accounts_list.incl.php');
?>