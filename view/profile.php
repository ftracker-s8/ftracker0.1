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
    <title>$8: User profile</title>
    <?php include_once "head.inc.php"; ?>
</head>
<body>
<?php include "header.php" ?>
<!--<h1>Main: Welcome --><?php //echo $userDetails->name; ?><!--</h1>-->
<div id="container" class="container">
    <div class="row">
        <div class="col-md-5 shadow-soft">
            <h1>
                Profile: <?php
                if (!empty($_SESSION['user_name'])) {
                    echo $_SESSION['user_name'];
                }
                ?>
            </h1>
            <?php
            //echo $_SESSION['user_name'] . "<br>";
            $the_url = "";
            include "../controller/user_pic_controller.php";
            $randata = rand(5,10);
            ?>
            <img width="300px" height="auto" src="<?php echo $the_url."?".$randata; ?>" >


            <form class="form-group-lg" enctype="multipart/form-data"
                  action="../controller/upload_userpic_controller.php"
                  method="post">
                <input type="hidden" name="MAX_FILE_SIZE" value="100000">
                <input class="btn btn-secondary" type="file" name="user_pic" size="20"><br>

                <input class="btn btn-primary" type="submit" name="uploadedfile" value="Upload image">
            </form>
            <br>
        </div>
        <div class="col-md-6 col-padding10 shadow-soft">
            <h1>Change username details</h1>
            <?php include "../controller/get_profile.php" ;?>
            <form class="form-group-lg" action="../controller/update_user_ctrl.php" method="post">
                <div class="form-group">
                    <label class="col-sm-3 control-label" for="user_email"a>User/email</label>
                    <input class="form-control" type="text" name="user_email" value="<?php echo $all_user_data[0]["user_email"] ?>" autofocus><br>
                </div>
                <!--            <span class="help-block">Last Name, First Name, eg.: Smith, Harry</span>-->
                New Password <input class="form-control" type="password" name="password" value=""><br>
                Confirm New Password <input class="form-control" type="password" name="cpassword"><br>
                First Name<input class="form-control" type="text" name="first_name" value="<?php echo $all_user_data[0]["first_name"] ?>"><br>
                Last Name<input class="form-control" type="text" name="last_name" value="<?php echo $all_user_data[0]["last_name"] ?>"><br>
                <input class="btn btn-primary" type="submit" name="updateuser" value="Update">
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
</div>
<?php include 'footer.php' ?>
</body>
</html>