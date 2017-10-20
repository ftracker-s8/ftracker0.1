<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
setcookie('upload-error', " ",time()+1000);


//include "../model/DBManager.php";
//include "../model/UserDAO.php";
//include "../model/UserVO.php";
//$userDao = \model\UserDao::getUserInstance();

use model\UserDAO;
use model\UserVO;

//include_once "../controller/session.php";

include "../model/UserVO.php";
include "../model/UserDAO.php";

$user = new \model\UserVO();
//$url = new \model\dao\UserPicDao();

if (isset($_POST['uploadedfile'])) {

    $folder = "../uploads/";
    $image = $_FILES['user_pic']['name'];

    $full_path = $folder . $image;

    $target_file = $folder . basename($_FILES["user_pic"]["name"]);

    $imageFileType = pathinfo($target_file, PATHINFO_EXTENSION);
    $allowed = array('jpeg', 'png', 'jpg');
    $filename = $_FILES['user_pic']['name'];
    $ext = pathinfo($filename, PATHINFO_EXTENSION);

    if (!in_array($ext, $allowed)) {
        $_COOKIE['upload-error'] = "Sorry, only JPG, JPEG, PNG & GIF  files are allowed.";
        echo "Sorry, only JPG, JPEG, PNG & GIF  files are allowed.";
        header("Location: ../view/profile.php");
    }
    elseif (($_FILES["user_pic"]["size"] > 200000)){
        $_COOKIE['upload-error'] = "Sorry, file is too big.";
        header("Location: ../view/profile.php");
        //echo "file too big";
    }
    else {

        if (file_exists($full_path)) unlink($full_path);

        $user_id = $_SESSION['user_id'];
        $custom_path = $folder.$user_id."-profile.".$ext;
        //var_dump($custom_path);
        //move_uploaded_file($_FILES['user_pic']['tmp_name'], $full_path);
        move_uploaded_file($_FILES['user_pic']['tmp_name'], $custom_path);

        //$url = $target_file;
        $url = $custom_path;

       // $user = $_SESSION['user_id'];

        try {
            $pdo = \model\DBManager::getInstance()->getConnection();

            $sql = "UPDATE users SET `user_pic` = ? WHERE `user_id` = ?";
            $stmt = $pdo->prepare($sql);
            $stmt->execute(array($url, $user_id));
            echo "success";
            $_COOKIE['upload-error'] = "Success.";
            header("Location: ../view/profile.php");

        }
        catch (PDOException $e) {
            echo "upload pic " . $e->getMessage();
        }

//    $sth=$con->prepare("insert into users(image)values(:image) ");
//
//    $sth->bindParam(':image',$image);
//
//    $sth->execute();

    }

}
else {
    echo "error upload";
}



//try {
//    if ((($_FILES["user_pic"]["type"] == "image/gif")
//            || ($_FILES["user_pic"]["type"] == "image/jpeg")
//            || ($_FILES["user_pic"]["type"] == "image/jpg")
//            || ($_FILES["user_pic"]["type"] == "image/png")
//        )
//        && ($_FILES["user_pic"]["size"] < 200000)
//    ) {
//        $user_id = $_SESSION['user_id'];
//        $target_path = "../uploads/";
//        $file_name = $_FILES['user_pic']['name'];
//        $tmp_name = $_FILES['user_pic']['tmp_name'];
//
//        $ext = pathinfo($file_name, PATHINFO_EXTENSION);
//
//        $file_format = mime_content_type($tmp_name);
//        //$type = explode("/", $fileFormat)[0];
//        //$extension = explode("/", $fileFormat)[1];
//        $fileSize = filesize($tmp_name);
//
//        //$target_path = $target_path . basename($_FILES['uploadedfile']['name']);
//        $target_path = $target_path . $user_id . "-user-pic.".$ext;
//        if (file_exists($target_path)) unlink($target_path);
//
//        //$_FILES['uploadedfile']['tmp_name'];
//        if (move_uploaded_file($_FILES['user_pic']['tmp_name'], $target_path)) {
//            //echo "The file ". basename( $_FILES['uploadedfile']['name'])." has been uploaded";
//
//
//            try {
//                $set_url = \model\UserDAO::getUserInstance()->setUserPic($user_id, $target_path);
//            }
//            catch (PDOException $e) {
//                echo "Error on upload" . $e->getMessage();
//            }
//            echo "The file " . $target_path . " has been uploaded";
//
//            //$_SESSION[''] = "";
//        } else {
//            echo "There was an error uploading the file, please try again!";
//        }
//    } else {
//        echo "Invalid file";
//    }
//}
//catch (PDOException $e) {
//    echo "upload erro: " . $e->getMessage();
//}
