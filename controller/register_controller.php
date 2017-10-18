<?php
/**
 * User: assen.kovachev
 */
use model\UserDAO;
use model\UserVO;
include_once "../controller/session.php";
include "../model/UserVO.php";
include "../model/UserDAO.php";


//Register Validation
if (isset($_POST['user_email']) && isset($_POST['password'])
    //&& filter_var($_POST['user_email'], FILTER_VALIDATE_EMAIL)
    && strlen($_POST['user_email']) > 3 && strlen($_POST['user_email']) < 254
    && strlen($_POST['password']) >= 4 && strlen($_POST['password']) < 20
    && strlen($_POST['first_name']) >= 4 && strlen($_POST['first_name']) < 20
    && strlen($_POST['last_name']) >= 4 && strlen($_POST['last_name']) < 20) {

    $user = new \model\UserVO();

    //Try to accomplish connection with the database
    try {

        $userDao = \model\UserDao::getUserInstance();

        $user->setUserEmail(htmlentities($_POST['user_email']));
        $user->setPassword(sha1($_POST['password']));
        $user->setFirstName(htmlentities($_POST['first_name']));
        $user->setLastName(htmlentities($_POST['last_ame']));
        $user->setUserPic("../uploads/placeholder.jpg");

        //Check if user exists
        if($userDao->existsUser($user)) {

            //Locate to error Register Page
            header("Location: ../view/user/register.php?error");
        } else {

            $user_id = $userDao->registerUser2($user);
            $_SESSION['user_id'] = "";
            //$_SESSION['user_id'] = $user_id;
            //$current_user_name = $userDao->getUserName($user_id);

//            $_SESSION['user_name'] = $first_name;
            //$userDao->setLastLogin($user);
            header("Location: ../view/login.php");
        }



    } catch (PDOException $e) {

        header("Location: ../../view/error/pdo_error.php");
    }

} else {

    //Locate to error Register Page
    header("Location: ../../view/user/register.php?error");
}

//    $username_check = preg_match('~^[A-Za-z0-9_]{3,20}$~i', $username);
//    $email_check = preg_match('~^[a-zA-Z0-9._-]+@[a-zA-Z0-9._-]+\.([a-zA-Z]{2,4})$~i', $email);
//    $password_check = preg_match('~^[A-Za-z0-9!@#$%^&*()_]{6,20}$~i', $password);
//    if($username_check && $email_check && $password_check && strlen(trim($name))>0)
//    {
//
//    }
