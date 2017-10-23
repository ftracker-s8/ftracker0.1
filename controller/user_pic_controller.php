<?php
/**
 * Created by PhpStorm.
 * User: assen.kovachev
 * Date: 18.10.2017 г.
 * Time: 02:29 ч.
 */
//include 'session.php';
include "../model/DBManager.php";
include '../model/userClass.php';

$user_id = "";
if(isset($_SESSION['user_id'])){
    $user_id = $_SESSION['user_id'];
}

//uuserPic

$products = null;
$userClass = new \model\userClass();

//$userPia = $userClass->userDetails($session_uid);
$userPic = $userClass->uuserPic($user_id);
$the_url = $userPic->user_pic;
//print_r($userPic);
?>
<!--//<h1>Welcome --><?php //echo $userPic->data; ?><!--</h1>-->
<img width="100%" height="auto" src="<?php echo $the_url; ?>" >

