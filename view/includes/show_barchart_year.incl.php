<?php

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

include "../model/Transaction.php";
include "../model/dao/TransactionDao.php";
include "../model/DBManager.php";

$uid = "";
$chart_data = '';
if(isset($_SESSION['user_id'])) {
    $uid = $_SESSION['user_id'];
}

$sql2inc = "
SELECT DATE_FORMAT(date_time, '%Y-%m') AS Month, COUNT(*),  SUM(amount) as amount
FROM transactions
WHERE exp_inc = 'inc' AND user_id = 26
GROUP BY DATE_FORMAT(date_time, '%Y-%m')
ORDER BY DATE_FORMAT(date_time, '%Y-%m') ASC
";
$sql3exp = "
SELECT DATE_FORMAT(date_time, '%Y-%m') AS Month, COUNT(*), SUM(amount) as amount
FROM transactions
WHERE exp_inc = 'exp' AND user_id = 26
GROUP BY DATE_FORMAT(date_time, '%Y-%m')
ORDER BY DATE_FORMAT(date_time, '%Y-%m') ASC
";

$sql4 = "
SELECT DATE_FORMAT(a.date_time, '%Y-%m') AS Month, SUM(a.amount) as amounti, SUM(b.amount) as amounte
FROM transactions as a
NATURAL JOIN transactions as b
WHERE a.exp_inc = 'inc' AND a.user_id = 26
GROUP BY DATE_FORMAT(a.date_time, '%Y-%m')
ORDER BY DATE_FORMAT(a.date_time, '%Y-%m') ASC
";

$sql5 ="
SELECT t.month, t.amountt, DATE_FORMAT(date_time,'%Y-%m') AS month, SUM(amount) AS amounte
FROM
(SELECT *, DATE_FORMAT(date_time, '%Y-%m') AS month, SUM(amount) as amountt
FROM transactions AS e
WHERE user_id = 26 AND exp_inc = 'inc'
GROUP BY DATE_FORMAT(date_time, '%Y-%m')
) as t
GROUP BY DATE_FORMAT(date_time, '%Y-%m')
";


$pdo = \model\DBManager::getInstance()->getConnection();
$sql = "SELECT amount FROM transactions WHERE exp_inc = 'inc'";
$stmt = $pdo->prepare($sql5);
$stmt->execute();
$incoms = $stmt->fetchAll(PDO::FETCH_ASSOC);


//$sql = "SELECT amount FROM transactions WHERE exp_inc = 'inc'";
//$stmt = $pdo->prepare($sql3exp);
//$stmt->execute();
//$expenses = $stmt->fetchAll(PDO::FETCH_ASSOC);

//print_r($incoms). PHP_EOL;
//print_r($incoms). PHP_EOL;
//exit();


//foreach ($incoms as $item) {
//    foreach ($expenses as $value) {
//        //$chart_data .= "{ year:'".$item["year"]."', profit:".$row["profit"].", purchase:".$row["purchase"].", sale:".$row["sale"]."}, ";
//        $chart_data .= "{ year:'" . $item['Month'] . "', inc:" . $item["amount"] . ", exp:" . $value["amount"] . "}, ";
//    }
//}
foreach ($incoms as $item) {
         $chart_data .= "{ year:'" . $item['month'] . "', inc:" . $item["amountt"] . ", exp:" . $item["amounte"] . "}, ";
}
print_r($chart_data);

//while($row = mysqli_fetch_array($result))
//{
//    $chart_data .= "{ year:'".$row["year"]."', profit:".$row["profit"].", purchase:".$row["purchase"].", sale:".$row["sale"]."}, ";
//}
//$chart_data = substr($chart_data, 0, -2);
?>

<div class="container" style="width:900px;">
<!--    <h2 align="center">Morris.js chart with PHP & Mysql</h2>-->
    <h3 align="center">2017 montly Incoms and Expenses report</h3>
    <br /><br />
    <div id="chart"></div>
</div>


<script>
    Morris.Bar({
        element : 'chart',
        data:[<?php echo $chart_data; ?>],
        barColors: ['#00a65a', '#f56954'],
        xkey:'year',
        ykeys:['inc', 'exp'],
        labels:['Incoms', 'Expenses'],
        hideHover:'auto',
        // stacked:true
    });
</script>