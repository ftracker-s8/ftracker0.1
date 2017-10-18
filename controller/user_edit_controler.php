<?php
if(session_status() == PHP_SESSION_NONE) {
    session_start();
}

//Autoload to require needed model files
function __autoload($className) {
    $className = '..\\' . $className;
    require_once str_replace("\\", "/", $className) . '.php';
}

$user = new \model\UserVO();

try {

    $userDao = \model\UserDao::getUserInstance();

    $user->setUserId($_SESSION['user_id']);

    //Receive array with user's info
    $userArr = $userDao->getUserInfo($user);


} catch (PDOException $e) {

    header("Location: ../../view/error/pdo_error.php");
}