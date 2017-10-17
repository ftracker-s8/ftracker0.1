<?php
if(isset($_SESSION["user_id"])){
    header("Location:view/main.php");
}
else{
    header("Location:view/login.php");
}