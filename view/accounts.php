<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
include "../model/UserDAO.php";
include "../model/UserVO.php";
use model\UserVO;
use model\UserDAO;
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Accounts</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
<?php include "menu.php" ?>
<!--<h1>Main: Welcome --><?php //echo $userDetails->name; ?><!--</h1>-->
<div><h1>
        Profile: <?php
        if (!empty($_SESSION['user_name'])) {
            echo $_SESSION['user_name'] . " | " . $_SESSION['user_id'];
        }
        ?>
    </h1>
    <?php
    include "../controller/user_pic_controller.php";
    ?>

</div>

</body>
</html>