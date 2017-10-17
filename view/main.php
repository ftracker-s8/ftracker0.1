<?php
include('../model/config.php');
include "../model/userClass.php";
//include('../controller/session.php');

//$userDetails = $userClass->userDetails($user_id);
//print_r($userDetails);

?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Main</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
<?php include "menu.php" ?>
<!--<h1>Main: Welcome --><?php //echo $userDetails->name; ?><!--</h1>-->
<div><h1>
    Welcome <?php echo $_SESSION['user_name'] . " | " .  $_SESSION['user_id']; ?>
    </h1>
</div>

</body>
</html>