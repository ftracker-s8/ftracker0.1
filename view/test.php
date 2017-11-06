<?php
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="css/bootstrapslate.min.css">

    <script src="js/bootstrap3.min.js"></script>
    <script src="js/jquery.min.js"></script>
    <script src="js/moment-locales.js"></script>
    <link rel="stylesheet" href="css/daterangepicker.css">
    <script src="js/daterangepicker.js"></script>
</head>
<body>

<?php

$temp_date = "11/05/2017";
$temp_time = date('H:i:s');
// $temp_date_time = $temp_date . " " . $temp_time;

//$old_date = date($temp_date_time);              // returns Saturday, January 30 10 02:06:34
$construct_date = date($temp_date. " " .$temp_time);
$old_date_timestamp = strtotime($construct_date);
$date_time = date('Y-m-d H:i:s', $old_date_timestamp);




var_dump($temp_date, $temp_time);
echo "<br>";
var_dump($new_date);
//$new_date =  dateY-m-d H:i:s


;?>

</body>
</html>
