<fieldset class="field_container profile-field">
    <form action="" method="post">
        <label class="label label-primary">Account name:</label>
        <input class="form-control" type="text" id="account_name_update" value="<?= $result['account_name'] ?>"><br>
        <label class="label label-primary">Amount: $$$</label>
        <input class="form-control text-right" type="number" id="ammount_update" value="<?= $result['ammount'] ?>" step=".10"><br>
        <label class="label label-primary">Account description:</label>
        <input class="form-control" type="text" id="account_desc_update" value="<?= $result['account_desc'] ?>"><br>
        <!--    <input class="btn btn-default pull-left" type="submit" name="update" value="Update">-->
        <input type="button" class="btn btn-success pull-left" value="Update" onclick="update_account_by_id('<?= $result['account_id'] ?>')" data-toggle="modal">
        <button type="button" class="btn btn-default pull-right" data-dismiss="modal">Close</button>
    </form>
</fieldset>
<!-- <div id="test22">
</div> -->
