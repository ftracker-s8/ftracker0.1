<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
//include "../model/UserDAO.php";
//include "../model/UserVO.php";
//use model\UserVO;
//use model\UserDAO;
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
<div id="container">
    <div class="profile-field">
    <h1>
        Profile: <?php
        if (!empty($_SESSION['user_name'])) {
            echo $_SESSION['user_name'] . " | id# " . $_SESSION['user_id'];
        }
        ?>
    </h1>
    <?php
        //echo $_SESSION['user_name'] . "<br>";

        include "../controller/user_pic_controller.php";

    ?>
        <br>


        <form enctype="multipart/form-data" action="" method="post">
            <input type="file" name="user_pic" size="20">
            <input type="submit" name="set_user_pic" value="Upload image">
        </form>
    </div>
    <div class="profile-field">
        <h1>Change username details</h1>
        <form action="../controller/update_user_ctrl.php"><br>
            User/email<input type="text" name="user_email" value="TODO ot sistemata"><br>
            Password <input type="text" name="password"><br>
            Confirm password <input type="text" name="password"><br>
            First Name<input type="text" name="first_name"value="TODO ot sistemata"><br>
            Last  Name<input type="text" name="last_name" value="TODO ot sistemata"><br>
            <input type="submit" name="update-user" value="Update">
        </form>
    </div>


</div>
<?php include 'footer.php' ?>
</body>
</html>