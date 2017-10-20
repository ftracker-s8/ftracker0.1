<?php
/**
 * Created by PhpStorm.
 * User: assen.kovachev
 * Date: 10.10.2017 г.
 * Time: 12:05 ч.
 */

?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Index page</title>
    <link rel="stylesheet" href="css/style.css">

</head>
<body>
<?php include "header.php" ?>
<div id="slider">
    <img src="images/s8itt-logo.png" alt="">
    <h1 style="color: white; text-shadow: black 0 2px 2px">Track your personal finances</h1><br>
    <a href="login.php" class="button2">Login</a>

</div>
<div>
    <table>
        <td><h2>Track your expenses</h2>
            Tracking spending is important if you don't know where your money is going, you can't make intelligent choices about how to divert it for maximum benefit. </td>
        <td><h2>Detailed Overview</h2>
            With the help of detailed inforgraphics of your expenditure you will begin to notice where to make appropriate cuts, good places to shift your resources and other goals you might want to make.</td>
        <td><h2>Cloud</h2>
            Instantly synchronize your transactions across all your devices and you will never lose your data again. </td>
    </table>
</div>
<?php include 'footer.php' ?>
</body>
</html>
