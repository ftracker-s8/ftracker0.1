<?php
/**
 * User: assen.kovachev
 */
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

use model\UserDAO;
use model\UserVO;
//include_once "../controller/session.php";

include "../model/UserVO.php";
include "../model/UserDAO.php";
//include "../model/UserPicClass.php";


//Register Validation
if (isset($_POST['user_email']) && isset($_POST['password'])
    && filter_var($_POST['user_email'], FILTER_VALIDATE_EMAIL)
    && strlen($_POST['user_email']) > 3 && strlen($_POST['user_email']) < 254
    && strlen($_POST['password']) >= 4 && strlen($_POST['password']) < 20
    && strlen($_POST['first_name']) >= 4 && strlen($_POST['first_name']) < 20
    && strlen($_POST['last_name']) >= 4 && strlen($_POST['last_name']) < 20) {

    $user = new \model\UserVO();

    $account_name = 'Cash';
    $amount = 0;
    $owner_id = "";

    try {

        $userDao = \model\UserDao::getUserInstance();

        $user->setUserEmail(htmlentities($_POST['user_email']));
        $user->setPassword(sha1($_POST['password']));
        $user->setFirstName(htmlentities($_POST['first_name']));
        $user->setLastName(htmlentities($_POST['last_name']));
        $user->setUserPic("../uploads/placeholder.jpg");

        //Check if user exists
        if($userDao->existsUser($user)) {

            //Locate to error Register Page
            setcookie('err-exist', 'user exist', time()+360 );
            $emailErr = "User already exist";
            header("Location: ../view/register.php");
        } else {

            $user_id = $userDao->registerUser2($user);

            $_SESSION['user_id'] = "";
            //echo $user_id;
            header("Location: ../view/login.php");
        }



    } catch (PDOException $e) {
        echo "PDOa rra: " . $e->getMessage();
        //header("Location: ../../view/error/pdo_error.php");
    }

} else {

    //Locate to error Register Page
    header("Location: ../view/register.php");
}

//    $username_check = preg_match('~^[A-Za-z0-9_]{3,20}$~i', $username);
//    $email_check = preg_match('~^[a-zA-Z0-9._-]+@[a-zA-Z0-9._-]+\.([a-zA-Z]{2,4})$~i', $email);
//    $password_check = preg_match('~^[A-Za-z0-9!@#$%^&*()_]{6,20}$~i', $password);
//    if($username_check && $email_check && $password_check && strlen(trim($name))>0)
//    {
//
//    }
