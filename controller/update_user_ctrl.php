<?php
/**
 * Created by PhpStorm.
 * User: Sheilly
 * Date: 19.10.2017 г.
 * Time: 13:26 ч.
 */
session_start();
include "../model/UserVO.php";
include "../model/UserDAO.php";

if (isset($_POST['updateuser'])
    //&& filter_var($_POST['user_email'], FILTER_VALIDATE_EMAIL)
    && strlen($_POST['user_email']) > 7 && strlen($_POST['user_email']) < 254
    //&& strlen($_POST['password']) >= 4 && strlen($_POST['password']) < 20
    && strlen($_POST['first_name']) >= 4 && strlen($_POST['first_name']) < 20
    && strlen($_POST['last_name']) >= 4 && strlen($_POST['last_name']) < 20) {
    //TODO ask for old password
    //TODO verify new pass match
    //TODO if password is 0 - get old pass

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
        //$user->setUserPic("../uploads/placeholder.jpg");
        if(isset($_SESSION['user_id'])) {
            $user->setUserId($_SESSION['user_id']);
        }
        //var_dump($user);

        $userDao->updateUserInfo($user);
        header("location: ../view/profile.php");
        //Check if user exists
//        if($userDao->existsUser($user)) {
//
//            //Locate to error Register Page
//            setcookie('err-exist', 'user exist', time()+360 );
//            header("Location: ../view/register.php");
//        } else {
//
//            $user_id = $userDao->registerUser2($user);
//            $_SESSION['user_id'] = "";
//            //echo $user_id;
//            header("Location: ../view/login.php");
//        }



    } catch (PDOException $e) {
        echo "PDOa rra: " . $e->getMessage();
        //header("Location: ../../view/error/pdo_error.php");
    }

} else {

    //Locate to error Register Page
    //header("Location: ../view/registererror.html");
    echo "PROBLEM!";

}