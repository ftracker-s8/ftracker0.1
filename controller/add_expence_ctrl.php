<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
$ammountErr = $emailErr = "";
$amount = $description = $user_id = "";
$_SESSION['exp-err'] = "";

include "../model/dao/AccountDao.php";
include "../model/Transaction.php";
include "../model/dao/TransactionDao.php";
include "../model/DBManager.php";

if (isset($_POST['add_exp'])) {
    $account_id = $_POST['account_id'];
    $value = $_POST['value'];
    //$exp_inc = $_POST['exp'];
    $exp_inc = 'exp';
    $category_id = $_POST['category'];
    $entrydate = test_input($_POST['entrydate']);
    $description = $_POST['description'];
    $recurent_bill = $_POST['recurent_bill'];
    if(isset($_SESSION['user_id'])) {
        $user_id = $_SESSION['user_id'];
    }
    else {
        $_SESSION['exp-err'] = "Empty UID";
        header("Location: ../main.php");
    }

    $temp_date = $entrydate;
    $temp_time = date('H:i:s');

    $construct_date = date($temp_date. " " .$temp_time);
    $old_date_timestamp = strtotime($construct_date);
    $date_time = date('Y-m-d H:i:s', $old_date_timestamp);

    $next_update = date('Y-m-d', strtotime('+1 month', strtotime($entrydate)));

    if($description == "") {
        $description = "no description";
    }

    $get_amount = \model\dao\AccountDao::getAInstance()->getUserAccountById2($account_id);
    $account_ammount = $get_amount['ammount'];
//    var_dump($account_ammount). "<br>";

    $value = ltrim($value, '0');
    $value = test_input($value);
//    var_dump($value). "<br>";
//    exit();

//    if ($value <= $account_ammount) { // ***** check for availability
        $new_ammount = $account_ammount - $value;

        $t_values = new \model\Transaction();

        $t_values->setAccountId($account_id);
        $t_values->setDateTime($date_time);
        $t_values->setAmount($value);
        $t_values->setExpInc($exp_inc);
        $t_values->setCategoryId($category_id);
        $t_values->setUserId($user_id);
        $t_values->setDescription($description);
        $t_values->setRecurentBill($recurent_bill);
        $t_values->setNextUpdate($next_update);

        $pdo = \model\DBManager::getInstance()->getConnection();
        try {
            $pdo = \model\DBManager::getInstance()->getConnection();
            $pdo->beginTransaction();
            //$transaction = \model\dao\TransactionDao::getTransactionInstance()->addExpence($t_values);
            $transaction = \model\dao\TransactionDao::getTransactionInstance()->addExpence($t_values);

            $upd_acc = \model\dao\AccountDao::getAInstance()->updateAccountAfterTransaction($new_ammount, $account_id);
            $pdo->commit();
            header("Location: ../view/main.php");

        }
        catch (PDOException $e) {
            $pdo->rollBack();
            echo "error adding expenses" . $e->getMessage();
        }

//    }
//    else {
//        $_SESSION['exp-err'] = "insufficient availability";
//        header("Location: ../view/main.php");
//    } // *****  end check for availability

} else {
    $_SESSION['exp-err'] = "Add Exp Error";
}

function test_input($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
//include "../view/includes/add_expence_form.incl.php";