<?php
include "../model/DBManager.php";
$pdo = \model\DBManager::getInstance()->getConnection();
$query = "SELECT * FROM accounts";
$stm = $pdo->prepare($query);
$stm->execute(array());
$result = $stm->fetchAll(\PDO::FETCH_ASSOC);
//$lastInsertId = $this->pdo->lastInsertId();
//return $result;

//$result = mysqli_query($connect, $query);
?>
<!DOCTYPE html>
<html>
<head>
    <title>Webslesson Tutorial | Bootstrap Modal with Dynamic MySQL Data using Ajax & PHP</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css"/>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
</head>
<body>
<br/><br/>
<div class="container" style="width:700px;">
    <h3 align="center">Bootstrap Modal with Dynamic MySQL Data using Ajax & PHP</h3>
    <br/>
    <div class="table-responsive">
        <table class="table table-bordered">
            <tr>
                <th width="70%">Employee Name</th>
                <th width="30%">View</th>
            </tr>
            <?php
            //while($row = mysqli_fetch_array($result))
            //while ($row = $stm->fetch(PDO::FETCH_ASSOC)) {
            foreach ($result as $row) {
                //$row["uitkeringen"][] = $row["uitkering"];
                ?>
                <tr>
                    <td><?php echo $row["account_name"]; ?></td>
<!--                    <td><input type="button" name="view" value="view" id="--><?php //echo $row["account_id"]; ?><!--" class="btn btn-info btn-xs view_data"/></td>-->
                    <td><input type="submit" name="view" value="view" id="<?php echo $row["account_id"]; ?>"
                               onclick="myF2(<?php echo $row["account_id"]; ?>)" class="btn btn-info btn-xs view_data"/></td>
                </tr>
                <?php
            }
            ?>
        </table>
    </div>
</div>
</body>
</html>
<div id="dataModal" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Account id or name</h4>
            </div>
            <div class="modal-body" id="account_detail">
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
<script>

//    $(document).ready(function () {
//        $('.view_data').click(function () {
//            var account_id = $(this).attr("account_id");
//            alert(account_id);
//            $.ajax({
//                url: "../controller/select.php",
//                method: "post",
//                data: {account_id: account_id},
//                success: function (data) {
//                    $('#account_detail').html(data);
//                    $('#dataModal').modal("show");
//                }
//            });
//        });
//    });
function myFk2($a){
    // Create our XMLHttpRequest object
    var hr = new XMLHttpRequest();
    // Create some variables we need to send to our PHP file
    var url = "../controller/select.php";
    //var fn = document.getElementById("first_name").value;
    var fn = document.getElementById($a).value;
    alert(fn,proba);
    //var ln = document.getElementById("last_name").value;
    //var vars = "firstname="+fn+"&lastname="+ln;
    hr.open("POST", url, true);
    // Set content type header information for sending url encoded variables in the request
    hr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    // Access the onreadystatechange event for the XMLHttpRequest object
    hr.onreadystatechange = function() {
        if(hr.readyState == 4 && hr.status == 200) {
            var return_data = hr.responseText;
            document.getElementById("status").innerHTML = return_data;
        }
    }
    // Send the data to PHP now... and wait for response to update the status div
    hr.send(vars); // Actually execute the request
    document.getElementById("status").innerHTML = "processing...";
}
function myF2(){
    //
    $('#toBeTranslatedForm').submit(function() {
        var textareaval = $('#userInput').val();
        alert(textareaval);
    });
}
</script>