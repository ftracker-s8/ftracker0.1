<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>$8 Index</title>
    <?php include_once "head.inc.php"; ?>
</head>
<body>
<!-- menu include -->
<?php include "header.php" ?><!-- end of menu -->

<div class="jumbotron">
    <div class="container">
        <h1 class="display-3">Track your personal finances <img src="images/s8itt-logo.png" alt=""></h1>
        <p>Tracking spending is important! If you don't know where your money is going, you can't make intelligent choices about how to divert it for maximum benefit. This is a course work project. It includes some basic functionality to track your personal finances.</p>
        <p><a class="btn btn-primary btn-lg" href="about.php" role="button">Learn more &raquo;</a></p>
    </div>
</div>

<div class="container">
    <!-- Example row of columns -->
    <div class="row index-page">
        <div class="col-md-4">
            <h2>Track your expenses</h2>
            <p>Tracking spending is important if you don't know where your money is going, you can't make intelligent choices about how to divert it for maximum benefit.</p>
            <p><a class="btn btn-secondary" href="#" role="button">View details &raquo;</a></p>
        </div>
        <div class="col-md-4">
            <h2>Overview</h2>
            <p>With the help of detailed inforgraphics of your expenditure you will begin to notice where to make appropriate cuts, good places to shift your resources and other goals you might want to make.</p>
            <p><a class="btn btn-secondary" href="#" role="button">View details &raquo;</a></p>
        </div>
        <div class="col-md-4">
            <h2>Cloud</h2>
            <p>Instantly synchronize your transactions across all your devices and you will never lose your data again. </p>
            <p><a class="btn btn-secondary" href="#" role="button">View details &raquo;</a></p>
        </div>
    </div>

    <hr>

    <footer>

        <?php include 'footer.php' ?>
    </footer>
</div> <!-- /container -->

</body>
</html>
