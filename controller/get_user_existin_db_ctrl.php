<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

include_once "../model/dao/UserCategoriesDao.php";
include_once "../model/DBManager.php";

//existsUser
