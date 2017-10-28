<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Register2</title>
    <?php include_once "head.inc.php"; ?>
    <style>
        .error {color: #FF0000;}
    </style>
</head>
<body>
<?php include "header.php" ?>
<div id="container" class="container">
<h1>Register</h1>
    <?php include "../controller/register_new_user_ctrl.php"; ?>
</div>
</body>
</html>
