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
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Register</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
<?php include "menu.php" ?>
<h1>Register</h1>
<div id="container">
<div id="signup">
<form action="../controller/register_controller.php" method="post">
    <label>email*</label>
    <input type="text" name="user_email" required><br>
    <label>password*</label>
    <input type="password" name="password" required><br>
    <label>First name</label>
    <input type="text" name="first_name"><br>
    <label>Last name</label>
    <input type="text" name="last_name">
    <input type="submit" name="register" value="Register">
</form>
</div>
</body>
</html>
