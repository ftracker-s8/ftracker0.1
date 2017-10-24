<?php
/**
 * Created by PhpStorm.
 * User: assen.kovachev
 * Date: 25.10.2017 г.
 * Time: 00:36 ч.
 */
?>
<fieldset class="field_container profile-field">
                        <form action="" method="post">
                            account name:
                            <input class="form-text" type="text" id="account_name_update"  name="account_name_update" value="<?= $result['account_name'] ?>"><br>
                            <label class="col-form-label-sm">amount</label>
                            <input class="form-text" type="text" id="ammount_update" value="<?= $result['ammount'] ?>"><br>
                            <label class="col-form-label-sm">account desc</label>
                            <input class="form-text" type="text" id="account_desc_update" value="<?= $result['account_desc'] ?>"><br>
                            <!--    <input class="btn btn-default pull-left" type="submit" name="update" value="Update">-->
                            <input type="button" class="btn btn-default pull-left" value="Update" onclick="update_account_by_id('<?= $result['account_id'] ?>')">
                            <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                        </form>
                    </fieldset>