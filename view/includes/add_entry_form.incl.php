<?php
/**
 * Created by PhpStorm.
 * User: assen.kovachev
 * Date: 26.10.2017 г.
 * Time: 01:28 ч.
 */

?>
<div class="form-row">
    <form class="form-group" action="../controller/add_expence_ctrl.php" method="post">
        <!--    account id: <input type="number" name="account_id" value="26" placeholder="26"><br>
        <input type="radio" class="radio-inline input-lg"  name="entype" value="0" checked>(-) Expense
        <input type="radio" class="radio-inline" name="entype" value="1"> (+)Income<br>-->

        <label class="" for="account_id">from account:</label>
        <select class="form-control input-lg" name="account_id" id="account_id">
            <?php
            include "../controller/get_user_account_list.php";

            foreach ($result_accounts as $row) {
                echo "<option value=\"" . $row['account_id'] . "\" selected>".$row['account_name'] . " (" .$row['ammount'] . "$)</option>";
            }

            ?>
        </select><br>

        Value: $$$ <input class="form-control input-lg" type="number" name="value" min="0" step=".01" required><br>
        <!--    <input type="text" name="exp" value="exp" hidden><br>-->
        <div class="row">
        <div class="col col-sm-5">
        <input type="radio" class="radio-inline input-lg"  name="recurent_bill" value="0" checked> Onetime
        <input type="radio" class="radio-inline" name="recurent_bill" value="1"> Recurent<br>
        </div>
<!--        <div class="col-md-4 col-md-offset-2 demo">-->


        <div class="col col-sm-7 pull-right">
            entry date:<i class="glyphicon glyphicon-calendar fa fa-calendar"></i> (month/date/year)
            <input id="entry2date" class="form-control pull-right" name="entrydate" type="text" value="<?= date('Y-m-d') ?>" size="11">
        </div>

        </div>
        Category <select class="form-control input-lg icon-menu" name="category" id="category">
            <?php
//            include "../controller/get_exp_union_categories_ctrl.php";
//            foreach ($united_list as $row) {
//                echo "<option value=\"" . $row['category_id'] . "\"> " . $row['category_name'] . "</option>";
//            }
            include "show_exp_union_list.php"

            ?>

        </select><br>
        Description: <input class="form-control input-lg" type="text" name="description"><br>



        <input class="btn btn-success pull-right" type="submit" name="add_exp" value="Add Expence">

        <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
    </form>
    <br>
</div>
<div class="alert">
    <?php
    if(!empty($_SESSION['exp-err'])) {
        echo "
        <div class='alert alert-dismissible alert-danger'>
            <button type='button' class='close' data-dismiss='alert'>&times;</button>
            <strong>" . $_SESSION["exp-err"] . "</strong> 
        </div>";

    }
    ?>
</div>