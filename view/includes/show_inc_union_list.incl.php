<?php
if(session_status() == PHP_SESSION_NONE) {
    session_start();
}

$results = "";
include_once "../controller/get_inc_union_categories_ctrl.php";

foreach ($united_inc_list as $row) { ?>
    <option style="background-image: url('images/icons/<?= $row['icon_url'] ?>')" value="<?= $row['category_id']?>"><?= $row['category_name']; ?></option>;
    <?php
}
?>