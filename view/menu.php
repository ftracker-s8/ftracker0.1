<?php
?>
<div id="menu">
    <div id="logo">s8ftracker</div>
    <div id="lita">
    <ul>
        <li><a href="main.php">Main</a></li>
        <li><a href="login.php">Login</a></li>
        <li><a href="register.php">Register</a></li>
        <li>|</li>
        <li><?php
        if(!empty($_SESSION['user_id'])) {
            echo $_SESSION['user_name']; ?>
            <form class="menu_button" action="../controller/logout.php" method="post">
    <input type="submit" name="logout" value="Logout">
</form>
            <?php
        }
            ?></li>
    </ul>
    </div>
</div>
