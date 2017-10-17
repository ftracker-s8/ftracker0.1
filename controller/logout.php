<?php
include('../model/config.php');
$session_uid='';
$_SESSION['user_id']='';

if(empty($session_uid) && empty($_SESSION['user_id']))
{
    $url=BASE_URL.'index.php';
    header("Location: $url");
//echo "<script>window.location='$url'</script>";
}
?>