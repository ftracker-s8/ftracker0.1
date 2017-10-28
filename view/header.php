<?php
if(isset($_SESSION['user_id']) && $_SESSION['user_id'] != ""){
    include "includes/menu_logedin.php";
}
else {
    include "includes/menu_not_loged.php";
}
?>