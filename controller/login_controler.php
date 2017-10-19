<?php
/**
 * User: assen.kovachev
 */

include("../model/config.php");
include('../model/userClass.php');
include('../model/UserDAO.php');
include('../model/UserVO.php');

use model\UserDAO;
use model\UserVO;

$userClass = new \model\userClass();
setcookie('login_test', "test", time()+ 3600);
$errorMsgReg = '';
$errorMsgLogin = '';

if (isset($_POST['loginSubmit'])) {
    $user_email = htmlentities($_POST['user_email']);
    $password = htmlentities($_POST['password']);
    $password = sha1($password);
    $first_name = '';
    $last_name = '';
    //$sha_password = sha1($_POST['password']);

    //$user = new UserVO($user_email, $password, $first_name, $last_name);

    if (strlen(trim($user_email)) > 2 && strlen(trim($password)) > 2) {
        //$user_id = $userClass->userLogin2($user_email,$password);
//        try {
            $user_id = UserDAO::getUserInstance()->userLogin3($user_email, $password);

            if ($user_id) {

                setcookie('login_error', " no problem", time() + 360);
                setcookie('login_pass', $password, time() + 360);

                $url = BASE_URL . 'view/main.php';
                echo "Loged";
                //header("Location: $url");
                header("Location: ../view/main.php");
            }
//        }
//        catch (PDOException $e) {
//            echo "errora: " . $e->getMessage();
//        }
else
        {
            $errorMsgLogin = "Please check login details.";
            $url = BASE_URL . 'view/login.php';
            setcookie('login_error', "problem s logina", time() + 360);
            setcookie('login_pass', $password, time() + 360);
            header("Location: $url");
        }
    }
}