<?php
/**
 * Created by PhpStorm.
 * User: assen.kovachev
 * Date: 13.10.2017 г.
 * Time: 11:22 ч.
 */
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
$err_user = "";
if (!empty($_COOKIE['err-exist'])) {
    $err_user = $_COOKIE['err-exist'];
}
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Register</title>
    <?php include_once "head.inc.php"; ?>
<!--    <script type="text/javascript" src="js/validate.min.js"></script>-->
    <script>

    </script>
    <style>

    </style>
</head>
<body>
<?php include "header.php" ?>
<div id="container" class="container">
    <div class="row">
        <h1>Register</h1>
        <div class="col-md-6 col-md-offset-3 shadow-soft">
            <div id="register" class="form-group">
                <br>
                <form action="../controller/register_controller.php" method="post" name="example_form">
                    <label class="col-form-label" for="user_email">Email*</label>
                    <input class="form-control" type="text" name="user_email" id="user_email" required placeholder="please enter valid email"
                           autocomplete="off" autofocus><?= $err_user ?><span class="error" aria-live="polite"></span><br>
                    <label>password*</label>
                    <input class="form-control" type="password" name="password" required placeholder=" please enter 4+ symbols"
                           autocomplete="off" id="password" minlength="4" maxlength="20"><br>
                    <label>First name</label>
                    <input class="form-control" type="text" name="first_name" placeholder="2-20 chars"><br>
                    <label>Last name</label>
                    <input class="form-control" type="text" name="last_name" placeholder="2-20 chars"><br>
                    <input class="btn btn-success" type="submit" name="Register" value="Register"><br>
                    <div class="clearfix"></div>
                </form>
            </div>
        </div>
    </div>
</div>
<div id="err">
    <?php if (isset($err_user)) {
        echo $err_user;
    }
    ?>
</div>
<?php include 'footer.php' ?>
<!--<script>-->
<!--    var validator = new FormValidator('example_form', [{-->
<!--        name: 'alphanumeric',-->
<!--        rules: 'alpha_numeric'-->
<!--    }, {-->
<!--        name: 'password',-->
<!--        rules: 'required|min_length[8]'-->
<!--    }, {-->
<!--        name: 'password_confirm',-->
<!--        display: 'password confirmation',-->
<!--        rules: 'required|matches[password]'-->
<!--    }, {-->
<!--        name: 'user_email',-->
<!--        rules: 'required|valid_email',-->
<!--        depends: function() {-->
<!--            return Math.random() > .5;-->
<!--        }-->
<!--    }, {-->
<!--        name: 'minlength',-->
<!--        display: 'min length',-->
<!--        rules: 'min_length[8]'-->
<!--    }], function(errors, event) {-->
<!--        if (errors.length > 0) {-->
<!--            // Show the errors-->
<!--        }-->
<!--    });-->
<!--</script>-->
</body>
</html>
