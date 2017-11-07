<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
include("../model/config.php");
include('../model/userClass.php');
$userClass = new \model\userClass();

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
    <div class="row">
        <h1>Login</h1>
        <div class="col-md-6 col-md-offset-3 shadow-soft">
            <div id="login" class="form-group">
                <br>
                <fieldset>
                    <legend>Login form:</legend>
                    <form method="post" action="../controller/login_controler.php" name="login">
                        <label class="">Email*</label>
                        <input type="text" name="user_email" autocomplete="" placeholder="valid email"
                               class="form-control"><br>
                        <label>Password*</label>
                        <input class="form-control" type="password" name="password" autocomplete=""
                               placeholder="password"/><br>
                        <div class="errorMsg"></div>
                        <input class="btn btn-success" type="submit" name="loginSubmit" value="Login">
                        <div class="clearfix"></div>
                    </form>

                    <div>or <a href="register.php">Register here</a></div>
                </fieldset>
            </div>
        </div>
    </div>
</div>

<?php include 'footer.php' ?>
</body>
</html>