<?php
?>
<div id="menu">
<!--    <div id="logo"><strong>$8</strong> finance tracker</div>-->
    <div id="logo"><a href="index.php"><img height="60" width="auto" src="images/s8itt-logo.png" alt=""></a></div>
    <div id="lita">
    <ul>
        <li><a href="main.php">Main</a></li>
        <li><a href="login.php">Login</a></li>
        <li><a href="register.php">Register</a></li>
        <li><?php

        if(!empty($_SESSION['user_id'])) {
            $name = $_SESSION['user_name'];
            echo "<a href=\"profile.php\">$name</a>" ?>
            <form class="menu_button" action="../controller/logout.php" method="post">
    <input type="submit" name="logout" value="Logout">
</form><a href=""></a>
            <?php
        }
            ?></li>
    </ul>
    </div>
</div>
