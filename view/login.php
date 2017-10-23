<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
include("../model/config.php");
include('../model/userClass.php');
$userClass = new \model\userClass();

$errorMsgReg = '';
$errorMsgLogin = '';

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <?php include_once "head.inc.php"; ?>
</head>
<body>
<?php include "header.php" ?>
<div id="container" class="container">
    <h1>Login</h1>
    <div class="col-md-3 center-block adk-shadow">
        <div id="login" class="form-group">
            <form method="post" action="../controller/login_controler.php" name="login">
                <label class="label">Email*</label>
                <input type="text" name="user_email" autocomplete="" placeholder="valid email" class="form-control"><br>
                <label>Password*</label>
                <input class="form-control" type="password" name="password" autocomplete="" placeholder="password"/><br>
                <div class="errorMsg"><?php echo $errorMsgLogin; ?></div>
                <input class="btn btn-default" type="submit" name="loginSubmit" value="Login">
                <div class="clearfix"></div>
            </form>
            <div>or <a href="register.php">Register here</a></div>
        </div>
    </div>
</div>

<?php include 'footer.php' ?>
</body>
</html>