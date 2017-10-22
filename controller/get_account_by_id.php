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
?>
<fieldset class="field_container profile-field">
<form action="" method="post">
    <label class="col-form-label-sm ">account name</label>
    <input class="form-text" type="text" id="account_name_update" value="<?= $result['account_name'] ?>"><br>
    <label class="col-form-label-sm">amount</label>
    <input class="form-text" type="text" id="ammount_update" value="<?= $result['ammount'] ?>"><br>
    <label class="col-form-label-sm">account desc</label>
    <input class="form-text" type="text" id="account_desc_update" value="<?= $result['account_desc'] ?>"><br>
<!--    <input class="btn btn-default pull-left" type="submit" name="update" value="Update">-->
    <input type="button" class="btn btn-default pull-left" value="Update" onclick="update_account_by_id('<?= $result['account_id'] ?>')" data-toggle="modal">
    <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
</form>
</fieldset>
<div id="test22">

</div>
