<?php
if(session_status() == PHP_SESSION_NONE) {
    session_start();
}
if(isset($_SESSION["user_id"])){
    header("Location:view/main.php");
}
else{
    header("Location:view/login.php");
}