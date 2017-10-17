<?php
/**
 * User: assen.kovachev
 */

include("../model/config.php");
include('../model/userClass.php');
include('../model/UserDAO.php');

use model\UserDAO;
use model\UserVO;

$userClass = new \model\userClass();
setcookie('login_test', "test", time()+ 3600);
$errorMsgReg = '';
$errorMsgLogin = '';

if (isset($_POST['loginSubmit'])) {
    $user_email = htmlentities($_POST['user_email']);
    $password = htmlentities($_POST['password']);
    $sha_password = sha1($_POST['password']);

    if (strlen(trim($user_email)) > 2 && strlen(trim($password)) > 2) {
        //$user_id = $userClass->userLogin2($user_email,$password);
//        try {
            $user_id = UserDAO::getUserInstance()->userLogin2($user_email, $sha_password);
            if ($user_id) {
                //$_SESSION['user_id'] = $user_id;
                setcookie('login_error', " no problem", time() + 360);
                setcookie('login_pass', $sha_password, time() + 360);

                $url = BASE_URL . 'main.php';
                header("Location: $url");
            }
//        }
//        catch (PDOException $e) {
//            echo "errora: " . $e->getMessage();
//        }
else
        {
            $errorMsgLogin = "Please check login details.";
            $url = BASE_URL . 'login.php';
            setcookie('login_error', "problem s logina", time() + 360);
            setcookie('login_pass', $sha_password, time() + 360);
            header("Location: $url");
        }
    }
}