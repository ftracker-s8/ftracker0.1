<fieldset class="field_container profile-field">
    <form action="" method="post">
        <label class="label label-discrete">Account name:</label>
        <input class="form-text" type="text" id="account_name_update" value="<?= $result['account_name'] ?>"><br>
        <label class="label label-discrete">Amount:</label>
        <input class="form-text text-right" type="number" id="ammount_update" value="<?= $result['ammount'] ?>" step=".01">$<br>
        <label class="label label-discrete">Account description:</label>
        <input class="form-text" type="text" id="account_desc_update" value="<?= $result['account_desc'] ?>"><br>
        <!--    <input class="btn btn-default pull-left" type="submit" name="update" value="Update">-->
        <input type="button" class="btn btn-default pull-left" value="Update" onclick="update_account_by_id('<?= $result['account_id'] ?>')" data-toggle="modal">
        <button type="button" class="btn btn-default pull-right" data-dismiss="modal">Close</button>
    </form>
</fieldset>
<!-- <div id="test22">
</div> -->
