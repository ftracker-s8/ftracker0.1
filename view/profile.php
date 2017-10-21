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
    <?php include_once "head.inc.php"; ?>
</head>
<body>
<?php include "header.php" ?>
<!--<h1>Main: Welcome --><?php //echo $userDetails->name; ?><!--</h1>-->
<div id="container" class="container">
    <div class="col-md-4">
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


        <form class="form-group" enctype="multipart/form-data" action="../controller/upload_userpic_controller.php"
              method="post">
            <input type="hidden" name="MAX_FILE_SIZE" value="100000">
            <input type="file" name="user_pic" size="20"><br>

            <input class="btn btn-primary" type="submit" name="uploadedfile" value="Upload image">
        </form>
    </div>
    <div class="col-md-4">
        <h1>Change username details</h1>
        <form class="form-group-lg" action="../controller/update_user_ctrl.php">
            <div class="form-group">
                <label class="col-sm-3 control-label" for="user_email">User/email</label>
                <input class="form-control" type="text" name="user_email" value="TODO ot sistemata" autofocus><br>
            </div>
            <!--            <span class="help-block">Last Name, First Name, eg.: Smith, Harry</span>-->
            Password <input class="form-control" type="text" name="password"><br>
            Confirm password <input class="form-control" type="text" name="password"><br>
            First Name<input class="form-control" type="text" name="first_name" value="TODO ot sistemata"><br>
            Last Name<input class="form-control" type="text" name="last_name" value="TODO ot sistemata"><br>
            <input class="btn btn-primary" type="submit" name="update-user" value="Update">
        </form>
        <?php
        if (!isset($_COOKIE['upload-error'])) {

            echo "  ";
            //setcookie('upload-error');
        } else {
            echo $_COOKIE['upload-error'];
        }
        ?>
    </div>


</div>
<?php include 'footer.php' ?>
</body>
</html>