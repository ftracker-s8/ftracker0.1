<?php
?>
<div id="menu">
    <ul>
        <li><a href="main.php">Main</a></li>
        <li><a href="login.php">Login</a></li>
        <li><a href="register.php">Register</a></li>
        <li>|</li>
        <li><?php
        if(!empty($_SESSION['user_id'])) {
            echo $_SESSION['user_id'];
        }
            ?></li>
    </ul>
</div>
