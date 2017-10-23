<!--$pdo = \model\DBManager::getInstance()->getConnection();-->
<!--$query = "SELECT * FROM accounts";-->
<!--$stm = $pdo->prepare($query);-->
<!--$stm->execute(array());-->
<!--$result = $stm->fetchAll(\PDO::FETCH_ASSOC);-->

<?php
include "../model/DBManager.php";
if(isset($_POST["submit"]))
{
    try {
        $output = '';
        $pdo = \model\DBManager::getInstance()->getConnection();
        $query = "SELECT * FROM accounts WHERE account_id = '" . $_POST["account_id"] . "'";
        $stm = $pdo->prepare($query);
        $stm->execute();
        $result = $stm->fetch(\PDO::FETCH_ASSOC);

//    foreach ($result as $row) {
//        echo $row['acount_name'];
//    }
        echo "<h1>" . $result['account_name'] . "</h1>";
    }
    catch (PDOException $e) {
        echo "aaaa" . $e->getMessage();
        trow: new PDOException();
    }
}

//    $output .= '
//      <div class="table-responsive">
//           <table class="table table-bordered">';
//    //while($row = mysqli_fetch_array($result))
//        //while ($row = $stm->fetch(PDO::FETCH_ASSOC))
//    foreach ($result as $row)
//    {
//        $output .= '
//                <tr>
//                     <td width="30%"><label>account_id</label></td>
//                     <td width="70%">'.$row["account_id"].'</td>
//                </tr>
//                <tr>
//                     <td width="30%"><label>account_name</label></td>
//                     <td width="70%">'.$row["account_name"].'</td>
//                </tr>
//                <tr>
//                     <td width="30%"><label>ammount</label></td>
//                     <td width="70%">'.$row["ammount"].'</td>
//                </tr>
//                <tr>
//                     <td width="30%"><label>account_desc</label></td>
//                     <td width="70%">'.$row["account_desc"].'</td>
//                </tr>
////                <tr>
////                     <td width="30%"><label>Age</label></td>
////                     <td width="70%">'.$row["age"].' Year</td>
////                </tr>
//                ';
//    }
//    $output .= "</table></div>";
//    echo $output;
//}
?>