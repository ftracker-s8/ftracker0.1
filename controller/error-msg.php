<?php
/**
 * Created by PhpStorm.
 * User: assen.kovachev
 * Date: 21.10.2017 г.
 * Time: 14:04 ч.
 */
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
?>
<div id="error-msg" class="error-msg">
    <?php
    if (!empty($_SESSION['error-account'])) {
        echo $_SESSION['error-account'];
    }
//    else
//        $_SESSION['error-account'] = ""
    ?>
</div>
