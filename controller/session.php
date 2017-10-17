<?php
if (!empty($_SESSION['user_id'])) {
    $session_uid = $_SESSION['user_id'];
    //include('../model/userClass.php');
    //include ('../model/UserDAO.php');
    //$userClass = new \model\userClass();
}

if (empty($session_uid)) {
    $url = BASE_URL . '../view/index.php';
    header("Location: $url");
}
?>