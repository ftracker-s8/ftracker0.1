<?php
/**
 * User: assen.kovachev
 */
use model\UserDAO;
use model\UserVO;
include_once "../controller/session.php";
include "../model/UserVO.php";
include "../model/UserDAO.php";

if(isset($_POST['register'])) {
    $user_email = htmlentities($_POST['user_email']);
    $password = htmlentities($_POST['password']);
    $hash_password = sha1($password);
    $first_name = htmlentities($_POST['first_name']);
    $last_name = htmlentities($_POST['last_name']);

//    $username_check = preg_match('~^[A-Za-z0-9_]{3,20}$~i', $username);
//    $email_check = preg_match('~^[a-zA-Z0-9._-]+@[a-zA-Z0-9._-]+\.([a-zA-Z]{2,4})$~i', $email);
//    $password_check = preg_match('~^[A-Za-z0-9!@#$%^&*()_]{6,20}$~i', $password);
//    if($username_check && $email_check && $password_check && strlen(trim($name))>0)
//    {
//
//    }

    $user = new UserVO($user_email, $hash_password, $first_name, $last_name);

    if(UserDAO::getUserInstance()->existsUser($user))
    {
        header("location: ../view/register.php");
    }
    else{
        UserDAO::getUserInstance()->insertUser($user);
        //echo "Bravo bace, regna se s id = " . $user->getUserId();
        header("location: ../view/login.php");

    }

}
