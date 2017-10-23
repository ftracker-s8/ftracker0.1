<?php
if(session_status() == PHP_SESSION_NONE) {
    session_start();
}


//function __autoload ( $class ){
//    $class = "..\\" . $class;
//    require_once str_replace("\\", "/", $class) .".php";
//}
$owner_id = $_SESSION['user_id'];

include_once "../model/dao/AccountDao.php";
include_once "../model/Accounts.php";
require_once "../model/DBManager.php";

if (class_exists('Accounts')) {
    $$oi = new Accounts($owner_id);
}




use \model\Accounts;
use model\dao\AccountDao;


$oi = new Accounts($owner_id);
?>
<h2>Accounts list</h2>
<table class="table table-bordered table_list table-hover" id="whole_table" cellspacing="2" cellpadding="0">
    <tr class="bg_h">
        <th>Account name</th>
        <th>Ammount</th>
        <th>Description</th>

        <th>Delete</th>
        <th>Modify</th>
    </tr>
<?php
    $result = AccountDao::getAInstance()->getUserAcountsList($oi);
    //print_r($account_list->getAccountName());
    foreach ($result as $row) {
        ?>
        <tr class="">
        <td><?php echo $row['account_name']; ?></td>
        <td class="text-right"><?php echo $row['ammount']; ?>&euro;</td>
        <td><?php echo $row['account_desc']; ?></td>
        <td><a href="#" class="delete_m" onclick="delete_account(<?php echo $row['account_id']; ?>)">Delete</a></td>
        <td data-toggle="modal" data-target="#modal-default"><a href="#" class="delete_m" onclick="ajaxRow('modala', '<?= $row['account_id']; ?>')">Modify</a></td>
        </tr>
<?php
}
?>
</table>
<div id="user-total">
    Total ammount from accounts: <strong><?php include "get_user_account_totals_ammount.php"?> &euro;</strong>
</div>
