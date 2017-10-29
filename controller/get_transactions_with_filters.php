<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
//include "../model/DBManager.php";
$q = $uid = $filt_cat = $rowCounts = "";
use model\dao\TransactionDao;
include "../model/dao/TransactionDao.php";
if (isset($_GET['q'])) {
    $q = intval($_GET['q']);
}
$uid = "";
if (isset($_SESSION['user_id'])) {
    $uid = $_SESSION['user_id'];
}


$date = "DATE(`date_time`) = CURDATE() AND";
$filt_cat = "(1,2,3,4,5)";
$uid = 26;
//var_dump($date, $filt_cat, $uid);

//var_dump($date);
//$sql1 = "SELECT * FROM `transactions` WHERE $date AND user_id = 26";
//$sql2 = "SELECT * FROM `transactions` WHERE DATE(`date_time`) >= DATE_SUB(CURDATE(), INTERVAL 1 DAY) AND DATE(`date_time`) < CURDATE()";
//SELECT * FROM `transactions` WHERE $date AND user_id = $uid AND category_id = $filt_cat
try {

    $pdo = \model\DBManager::getInstance()->getConnection();
    //$sql = "SELECT * FROM `transactions` WHERE $date AND user_id = $uid AND category_id = $filt_cat";
    $sql = "SELECT * FROM `transactions` WHERE $date user_id = $uid AND `category_id`  IN $filt_cat";
    $stmt = $pdo->prepare($sql);
    $stmt->execute();
    $resulta = $stmt->fetchAll(\PDO::FETCH_ASSOC);
    $rowCounts = $stmt->rowCount();
    //var_dump($stmt);

    //return $resulta;
}
catch (PDOException $e) {
    echo "erewrwer" . $e->getMessage();

}

echo "row count" . $rowCounts;
?>

<table class="table table-bordered">
    <tr class="bg_h">
        <th>Date</th>
        <th>Category</th>
        <th>Description</th>
        <th>Ammount</th>
        <th>Recurent</th>
        <th>Moify</th>
    </tr>

    <?php foreach ($resulta as $item) { ?>
        <tr>
            <td><?php
                $dt = $item['date_time'];
                $date = explode(' ', $dt);
                echo ($date[0]) . "<br>";
                ?></td>

            <td><?= $item['category_name'] ?></td>
            <td><?= $item['description'] ?></td>

            <td><span class="pull-right"><?php
                    if ($item['exp_inc'] == "exp") {
                        echo "-";
                    } else {
                        echo "";
                    } ?>

                    <?= $item['amount'] ?>$</span></td>

            <td><?= $item['recurent_bill'] ?></td>
            <!--        <td>--><? //= $item['user_id'] ?><!--</td>-->
            <!-- <td><a href="#" class="btn btn-danger delete_m" onclick="delete_account(<?php echo $item['account_id']; ?>)">Delete</a></td> -->
            <td><a data-toggle="modal" data-target="#modal-add-exp" href="#" class="btn btn-success btn-xs"
                   onclick="mod_transaction('modala', '<?= $item['transaction_id']; ?>')">Modify</a></td>

        </tr>

        <?php
    }
    ?>
</table>
