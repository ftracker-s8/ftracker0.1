<?php
/**
 * Created by PhpStorm.
 * User: assen.kovachev
 * Date: 26.10.2017 г.
 * Time: 01:28 ч.
 */

?>
<div class="form-group">
<form action="../controller/add_expence_ctrl.php" style="border: 1px solid crimson;" method="post">
    <!--    account id: <input type="number" name="account_id" value="26" placeholder="26"><br>-->
    <label class="" for="account_id">from account:</label>
    <select class="form-control" name="account_id" id="account_id">
        <?php
        include "../controller/get_user_account_list.php";

        foreach ($result_accounts as $row) {
            echo "<option value=\"" . $row['account_id'] . "\" selected>".$row['account_name'] . " (" .$row['ammount'] . "$)</option>";
        }

        ?>
    </select><br>
    Value: <input class="form-text" type="number" name="value" min="0" step=".01" required>$<br>
    <!--    <input type="text" name="exp" value="exp" hidden><br>-->
    Category <select name="category" id="category">
        <?php
        include "../controller/get_user_categories_list.php";
        foreach ($union_result as $row) {
            echo "<option value=\"" . $row['category_id'] . "\" selected> " . $row['category_name'] . "</option>";
        }

        ?>

    </select><br>
    Description: <input type="text" name="description"><br>

    <input type="radio" name="recurent_bill" value="0" checked> Onetime
    <input type="radio" name="recurent_bill" value="1" disabled> Recurent<br>
    <input class="btn btn-default" type="submit" name="add_exp" value="Add Expence">
</form>
    <div>
    <?php
    if(!empty($_SESSION['exp-err'])) {
        echo $_SESSION['exp-err'];
    }
    ?>
    </div>
</div>