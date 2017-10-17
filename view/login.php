<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
include("../model/config.php");
include('../model/userClass.php');
//$userClass = new \model\userClass();

$errorMsgReg = '';
$errorMsgLogin = '';

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
<?php include "menu.php" ?>
<div id="container">
    <div id="login">
        <h3>Login</h3>
        <form method="post" action="../controller/login_controler.php" name="login">
            <label>Email*</label>
            <input type="text" name="user_email" autocomplete="" placeholder="valid email"/>
            <label>Password*</label>
            <input type="password" name="password" autocomplete="" placeholder="password"/>
            <div class="errorMsg"><?php echo $errorMsgLogin; ?></div>
            <input type="submit" class="button" name="loginSubmit" value="Login">
        </form>
        <div>or <a href="register.php">Register here</a></div>
        <div>error:<?php
            if (empty($_COOKIE["login_test"])) {
                echo "empty";
            } else {
                echo "non empty";
            }
            ?>

            <?php

            if (isset($_COOKIE["login_error"])) {
                echo $_COOKIE["login_error"] . "<br>";
                echo $_COOKIE["login_pass"];
            }
            ?>
        </div>
    </div>
</div>


</body>
</html>