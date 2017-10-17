<?php
include('../model/config.php');
include "../model/userClass.php";
include('../controller/session.php');

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
<div>error:<?php
    if (empty($_COOKIE["login_test"])) {
        echo "empty";
    } else {
        echo $_COOKIE["login_test"];
    }
    ?>

    <?php

    if (isset($_COOKIE["login_error"])) {
        echo $_COOKIE["login_error"] . "<br>";
        echo $_COOKIE["login_pass"];
    }
    ?>
</div>

<h4><a href="<?php echo BASE_URL; ?>logout.php">Logout</a></h4>
<form action="../controller/logout.php" method="post">
    <input type="submit" name="logout" value="Logout">
</form>
</body>
</html>