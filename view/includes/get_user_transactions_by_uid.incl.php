<?php
/**
 * Created by PhpStorm.
 * User: assen.kovachev
 * Date: 26.10.2017 г.
 * Time: 01:31 ч.
 * $account_id, $amount, $exp_inc, $category_id, $user_id,
 */

foreach ($resulta as $item) {
    echo $item['account_id']. " | " . $item['date_time']. " | " . $item['amount']. "$ | " . $item['description'] . "<br>";
}