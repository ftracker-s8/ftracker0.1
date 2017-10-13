<?php
if(isset($_SESSION["user_id"])) {
    header("location: view/main.html");
}
else {
    header("location: view/login.html");
}