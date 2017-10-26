<?php
/**
 * Created by PhpStorm.
 * User: assen.kovachev
 * Date: 25.10.2017 г.
 * Time: 15:55 ч.
 */
include "../controller/get_categories_list.php";
?>
<table class="table table-bordered table_list table-hover" id="whole_table" cellspacing="2" cellpadding="0">
    <tr class="bg_h">
        <th>Category name</th>
        <th>Description</th>
    </tr>
    <?php
    //$result = AccountDao::getAInstance()->getUserAcountsList($oi);

    foreach ($categories_result as $row) {
        ?>
        <tr >

            <td style="color: <?php echo $row['color'] ?>"><img width="20px" height="20px" src="images/icons/<?php echo $row['icon_url']; ?>" alt=""> <?php echo $row['category_name'] ?></td>
            <td><?php echo $row['category_desc'] ?></td>
        </tr>

        <?php
    } //end foreach
    ?>
</table>
