<?php
include('../model/config.php');
$session_uid='';
$_SESSION['user_id']='';
$_SESSION['user_name'] = '';

if(empty($session_uid) && empty($_SESSION['user_id']))
{
    $url=BASE_URL.'index.php';
    header("Location: $url");
//echo "<script>window.location='$url'</script>";
}
?>