<?php
/**
 * Created by PhpStorm.
 * User: Sheilly
 * Date: 19.10.2017 г.
 * Time: 13:26 ч.
 */
if(session_status() == PHP_SESSION_NONE) {
    session_start();
}
include "../model/UserVO.php";
include "../model/UserDAO.php";
use model\UserVO;
use model\UserDAO;

//var_dump($_POST['password']);
//
//$res = strlen($_POST['password']);
//var_dump($res);
//exit();
$uid = "";
$owner_id = "";
$set_old_pass = "";
if(isset($_SESSION["user_id"])) {
                $uid = $_SESSION["user_id"];
            }
//var_dump($uid);
if (isset($_POST['updateuser'])
    //&& filter_var($_POST['user_email'], FILTER_VALIDATE_EMAIL)
    // strlen($_POST['user_email']) > 7 && strlen($_POST['user_email']) < 254
    //&& strlen($_POST['password']) >= 4 && strlen($_POST['password']) < 20
    && strlen($_POST['first_name']) >= 0 && strlen($_POST['first_name']) < 20
    && strlen($_POST['last_name']) >= 0 && strlen($_POST['last_name']) < 20) {
    //TODO ask for old password
    //TODO verify new pass match
    //TODO if password is 0 - get old pass

    $user = new \model\UserVO();

    $account_name = 'Cash';
    $amount = 0;

    //$uid = "";


    //$passw = new \model\UserVO();

    try {

        $userDao = \model\UserDao::getUserInstance();
        $userDaoPass = UserDAO::getUserInstance();
        $user->setUserEmail(htmlentities($_POST['user_email']));
        //$user->setPassword(sha1($_POST['password']));

        $user->setFirstName(htmlentities($_POST['first_name']));
        $user->setLastName(htmlentities($_POST['last_name']));
        $user->setUserId($uid);
        //$user->setUserPic("../uploads/placeholder.jpg");

//        var_dump($user);
//        exit();
        $userDao->updateUserInfo($user);
        if (isset($_SESSION['user_name'])) {
            $_SESSION['user_name'] = htmlentities($_POST['first_name']);
        }
        if(trim(strlen($_POST['password'])) > 4) {
            $uid = "";
            if(isset($_SESSION["user_id"])) {
                $uid = $_SESSION["user_id"];
            }
            $new_pass = (trim(htmlentities($_POST['password'])));

            $userDaoPass->updateUserPassword($new_pass, $uid);
        }
        else {
            //echo "Pss provb";
            header("location: ../view/profile.php");
        }
//echo "OK";
        header("location: ../view/profile.php");

    } catch (PDOException $e) {
        echo "PDOa rra: " . $e->getMessage();

        //header("Location: ../../view/error/pdo_error.php");
    }

} else {

    //Locate to error Register Page
    //header("Location: ../view/registererror.html");
    echo "PROBLEM!";

}