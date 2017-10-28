<?php
?>
<h2>Account list</h2>
<table class="table table-bordered table_list table-hover" id="whole_table" cellspacing="2" cellpadding="0">
    <tr class="bg_h">
        <th>Account name</th>
        <th>Ammount</th>
        <th>Description</th>

        <th>Delete</th>
        <th>Modify</th>
    </tr>
    <?php

    include "../controller/get_user_account_list.php";
    foreach ($result_accounts as $row) {
        ?>
        <tr class="">
            <td><?php echo $row['account_name']; ?></td>
            <td class="text-right"><?php echo $row['ammount']; ?>&euro;</td>
            <td><?php echo $row['account_desc']; ?></td>
            <td><a href="#" class="btn btn-danger delete_m" onclick="delete_account(<?php echo $row['account_id']; ?>)">Delete</a></td>
            <td><a data-toggle="modal" data-target="#modal-default" href="#" class="btn delete_m btn-success" onclick="ajaxRow('modala', '<?= $row['account_id']; ?>')">Modify</a></td>
        </tr>
        <?php
    }
    ?>
</table>
<div id="user-total">
    Total ammount from accounts: <strong><?php include "../controller/get_user_account_totals_ammount.php"?> &euro;</strong>
</div>
