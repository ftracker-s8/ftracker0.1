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
    $description = $_POST['description'];
    $recurent_bill = $_POST['recurent_bill'];
    if(isset($_SESSION['user_id'])) {
        $user_id = $_SESSION['user_id'];
    }
    else {
        $_SESSION['exp-err'] = "Empty UID";
        header("Location: ../main.php");
    }
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
    if ($value <= $account_ammount) {
        $new_ammount = $account_ammount - $value;
//        var_dump($new_ammount). "<br>";
//        exit();
        $t_values = new \model\Transaction();

//        $t_values->$account_id = $account_id;
//        $t_values->$amount = $new_ammount;
//        //$t_values->$exp_inc = "exp";
//        $t_values->$category_id = $category_id;
//        $t_values->$user_id;
//        $t_values->$description = $description;
//        $t_values->$recurent_bill = 0;
        $t_values->setAccountId($account_id);
        $t_values->setAmount($value);
        $t_values->setExpInc($exp_inc);
        $t_values->setCategoryId($category_id);
        $t_values->setUserId($user_id);
        $t_values->setDescription($description);
        $t_values->setRecurentBill($recurent_bill);

//        var_dump($t_values);
//        exit();

        //var_dump($new_ammount);
        //exit();
//        var_dump($new_ammount, $account_id);
//        exit();
        $pdo = \model\DBManager::getInstance()->getConnection();
        try {
            $pdo = \model\DBManager::getInstance()->getConnection();
            $pdo->beginTransaction();
            $transaction = \model\dao\TransactionDao::getTransactionInstance()->addExpence($t_values);

            $upd_acc = \model\dao\AccountDao::getAInstance()->updateAccountAfterTransaction($new_ammount, $account_id);
            $pdo->commit();
            header("Location: ../view/main.php");

        }
        catch (PDOException $e) {
            $pdo->rollBack();
            echo "error adding expenses" . $e->getMessage();
        }

    } else {
        $_SESSION['exp-err'] = "insufficient availability";
        header("Location: ../view/main.php");
    }

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