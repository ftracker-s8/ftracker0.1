<?php
/**
 * Created by PhpStorm.
 * User: assen.kovachev
 * Date: 29.10.2017 г.
 * Time: 20:11 ч.
 */
include_once "../controller/get_exp_union_categories_ctrl.php";


    foreach ($united_list as $row) { ?>
        <option style="background-image: url('images/icons/<?= $row['icon_url'] ?>')" value="<?= $row['category_id']?>"><?= $row['category_name']; ?></option>;
<?php
}
?>