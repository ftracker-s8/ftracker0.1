<?php
/**
 * Created by PhpStorm.
 * User: assen.kovachev
 * Date: 6.11.2017 г.
 * Time: 10:11 ч.
 */

$sql_recurrent = "SELECT * FROM transactions
WHERE recurent_bill = 1";


try {

} catch (Exception $e) {
    exit(0);
}

if ($verified) {
    // IPN response was "VERIFIED"
} else {
    // IPN response was "INVALID"
}