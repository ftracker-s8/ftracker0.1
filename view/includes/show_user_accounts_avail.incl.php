<?php
?>
<table class="table table-bordered table_list table-hover" id="whole_table" cellspacing="2" cellpadding="0">
    <tr class="bg_h">
        <th>Account name</th>
        <th>Ammount</th>
    </tr>
    <?php

    include "../controller/get_user_account_list.php";
    foreach ($result_accounts as $row) {
        ?>
        <tr class="">
            <td><?php echo $row['account_name']; ?></td>
            <td class="text-right"><?php echo $row['ammount']; ?>&euro;</td>
        </tr>
        <?php
    }
    ?>
</table>
<div id="user-total">
    Total ammount from accounts: <strong><?php include "../controller/get_user_account_totals_ammount.php"?> &euro;</strong>
</div>
