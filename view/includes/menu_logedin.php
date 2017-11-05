<nav class="navbar navbar-default navbar-fixed-top">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar"
                    aria-expanded="false" aria-controls="navbar">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <!--            <a class="navbar-brand" href="#">Project name</a>-->
            <a class="navbar-brand" href="index.php"><img height="50px" width="auto" src="images/s8itt-logo.png" alt=""></a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
            <ul class="nav navbar-nav">
                <!--                <li class="active"><a href="#">Home</a></li>-->
                <li><a href="main.php"><i class="glyphicon glyphicon-piggy-bank"></i> Montly budget</a></li>
                <li><a href="overview.php"><i class="glyphicon glyphicon-signal"></i> Overview</a></li>

                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true"
                       aria-expanded="false">Customize <span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <!--                        <li role="separator" class="divider"></li>-->
                        <!--                        <li class="dropdown-header">Nav header</li>-->
                        <li><a href="accounts.php">Accounts</a></li>
                        <li><a href="categories.php">Categories</a></li>
                        <li role="separator" class="divider"></li>
                        <li><a href="profile.php">Edit Profile</a></li>

                    </ul>
                </li>
                <li class="userli">
                </li>
            </ul>
            <div class="navbar-right">
                <div id="user_pic" style="display: inline-block">
                    <?php
                    include_once "../controller/user_pic_controller.php";
                    ?>
                    <img width="auto" height="46px" src="<?php echo $the_url ?>">
                </div>

                <?php

                if (!empty($_SESSION['user_id'])) {
                    $name = $_SESSION['user_name'];
                    echo "<a href=\"profile.php\">settings [$name]</a>" ?>
                    <form class="navbar-form" action="../controller/logout.php" method="post">
                        <input class="btn btn-success" type="submit" name="logout" value="Logout">
                    </form>
                <?php } ?>

            </div>

            <!-- <form class="navbar-form navbar-right">
                <div class="form-group">
                    <input placeholder="Email" class="form-control" type="text">
                </div>
                <div class="form-group">
                    <input placeholder="Password" class="form-control" type="password">
                </div>
                <button type="submit" class="btn btn-success">Sign in</button>
            </form> -->
        </div><!--/.navbar-collapse -->
    </div>
</nav>