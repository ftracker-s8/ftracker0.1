<?php
/**
 * Created by PhpStorm.
 * User: assen.kovachev
 * Date: 20.10.2017 г.
 * Time: 02:22 ч.
 */
if(session_status() == PHP_SESSION_NONE) {
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
    <title>$8: Expenses</title>
    <?php include_once "head.inc.php"; ?>
    <script src="js/raphael.min.js"></script>
    <script src="js/morris.min.js"></script>
    <script src="js/tracker.js"></script>
    <script src="js/ajaxAdk.js"></script>
</head>
<body>
<?php include "header.php" ?>

<div class="container">
    <!-- Example row of columns -->
    <h1>About</h1>
    <div class="row">
        <div class="col-md-4">
            <h2>Introduction:</h2>
            <p>On registration will be generated 2 user accounts - Cash and Salary</p>
            <p>Salaray accounts you can set recurrent incoms.</p>
        </div>
        <div class="col-md-4">
            <h2>Heading</h2>
            <p>Donec id elit non mi porta gravida at eget metus. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus. Etiam porta sem malesuada magna mollis euismod. Donec sed odio dui. </p>
            <p><a class="btn btn-secondary" href="#" role="button">View details &raquo;</a></p>
        </div>
        <div class="col-md-4">
            <h2>Heading</h2>
            <p>Donec sed odio dui. Cras justo odio, dapibus ac facilisis in, egestas eget quam. Vestibulum id ligula porta felis euismod semper. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus.</p>
            <p><a class="btn btn-secondary" href="#" role="button">View details &raquo;</a></p>
        </div>
    </div>

    <hr>

    <footer>
        <p>&copy; Company 2017</p>
        <?php include 'footer.php' ?>
    </footer>
</div> <!-- /container -->
</body>
</html>
