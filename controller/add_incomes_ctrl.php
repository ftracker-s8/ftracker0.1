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
use model\dao\AccountDao;
use model\dao\TransactionDao;

if (isset($_POST['add_inc'])) {
    $account_id = $_POST['account_id'];
    $value = $_POST['value'];
    //$exp_inc = $_POST['exp'];
    $exp_inc = 'inc';
    $category_id = $_POST['category'];
    $description = $_POST['description'];
    $recurent_bill = $_POST['recurent_bill'];

    if (isset($_SESSION['user_id'])) {
        $user_id = $_SESSION['user_id'];
    } else {
        $_SESSION['exp-err'] = "Empty UID";
        header("Location: ../main.php");
    }
    if ($description == "") {
        $description = "no description";
    }

    $get_amount = \model\dao\AccountDao::getAInstance()->getUserAccountById2($account_id);
    $account_ammount = $get_amount['ammount'];
//    var_dump($account_ammount). "<br>";

    $value = ltrim($value, '0');
    $value = floatval(test_input($value));

    //account_id, `amount`, exp_inc, category_id, description, recurent_bill, user_id

    if ($value > 0) {
        $new_ammount = $account_ammount + $value;

        $inc_values = new \model\Transaction();

        $inc_values->setAccountId($account_id);
        $inc_values->setAmount($value);
        $inc_values->setExpInc($exp_inc);
        $inc_values->setCategoryId($category_id);
        $inc_values->setDescription($description);
        $inc_values->setRecurentBill($recurent_bill);
        $inc_values->setUserId($user_id);

        if (!isset($pdo)) {
            $pdo = \model\DBManager::getInstance()->getConnection();
        }

        try {

            $pdo = \model\DBManager::getInstance()->getConnection();
            $pdo->beginTransaction();
            $transaction = \model\dao\TransactionDao::getTransactionInstance()->addIncome($inc_values);

            $upd_acc = \model\dao\AccountDao::getAInstance()->updateAccountAfterTransaction($new_ammount, $account_id);
            $pdo->commit();
            header("Location: ../view/main.php");

        } catch (PDOException $e) {
            $pdo->rollBack();
            echo "error adding expenses" . $e->getMessage();
        }

    } else {
        $_SESSION['exp-err'] = "insufficient availability";
        header("Location: ../view/main.php");
    }
}
else {
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