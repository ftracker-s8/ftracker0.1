<!-- include in add_expence_ctrl.php -->
<table class="table table-bordered">
    <tr class="bg_h">
        <th>aid</th>
        <th>Date</th>
        <th>ammount</th>
        <th>Cat id</th>
        <th>Desc</th>
        <th>recurent</th>
        <th>User</th>
    </tr>

    <?php foreach ($resulta as $item) { ?>
    <tr >
        <td><?= $item['category_name'] ?></td>
        <td><?php
            $dt = $item['date_time'];
            $date = explode(' ', $dt);
            echo ($date[0]) ."<br>";
             ?></td>

        <td ><span class="pull-right"><?= $item['amount'] ?>$</span></td>
        <td><?= $item['category_id'] ?></td>
        <td><?= $item['description'] ?></td>
        <td><?= $item['recurent_bill'] ?></td>
        <td><?= $item['user_id'] ?></td>

    </tr>
    <?php } //end foreach ?>
</table>
