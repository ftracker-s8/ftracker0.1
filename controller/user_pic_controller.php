<?php
/**
 * Created by PhpStorm.
 * User: assen.kovachev
 * Date: 18.10.2017 г.
 * Time: 02:29 ч.
 */
use model\UserVO;
use model\UserDAO;
include "../model/UserDAO.php";
include "../model/UserVO.php";

$muser_pic = 1;
$url = takeUserPic2($muser_pic);
?>
<div>
echo  "<img src=\"$url\" alt=\"\">";
</div>
