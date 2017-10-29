<!-- include in add_expence_ctrl.php -->
<table class="table table-bordered">
    <tr class="bg_h">
        <th>Date</th>
        <th>Category</th>
        <th>Description</th>
        <th>Ammount</th>
        <th>Recurent</th>
        <th>Moify</th>
    </tr>

    <?php foreach ($resulta as $item) { ?>
        <tr>
            <td><?php
                $dt = $item['date_time'];
                $date = explode(' ', $dt);
                echo ($date[0]) . "<br>";
                ?></td>

            <td><?= $item['category_name'] ?></td>
            <td><?= $item['description'] ?></td>

            <td><span class="pull-right"><?php
                    if ($item['exp_inc'] == "exp") {
                        echo "-";
                    } else {
                        echo "";
                    } ?>

                    <?= $item['amount'] ?>$</span></td>

            <td><?= $item['recurent_bill'] ?></td>
            <!--        <td>--><? //= $item['user_id'] ?><!--</td>-->
            <!-- <td><a href="#" class="btn btn-danger delete_m" onclick="delete_account(<?php echo $item['account_id']; ?>)">Delete</a></td> -->
            <td><a data-toggle="modal" data-target="#modal-add-exp" href="#" class="btn delete_m btn-success"
                   onclick="mod_transaction('modala', '<?= $item['transaction_id']; ?>')">Modify</a></td>

        </tr>
    <?php } //end foreach ?>
</table>
