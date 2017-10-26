<?php
/**
 * Created by PhpStorm.
 * User: assen.kovachev
//transactions
// transaction_id, date_time, account_id,amount,exp_inc,category_id,description,user_id, recurent_bill
 */

namespace model\dao;
use model\DBManager;
use model\Transaction;

class TransactionDao {

    private static $instance;
    private $pdo;

    private function __construct()
    {
        $this->pdo = DBManager::getInstance()->getConnection();
    }

    public static function getTransactionInstance()
    {
        if (self::$instance === null) {
            self::$instance = new TransactionDao();
        }
        return self::$instance;
    }
    // transaction_id, date_time, account_id, amount,exp_inc,category_id,description,user_id, recurent_bill
    // $account_id, $amount, $exp_inc, $category_id, $user_id, $description=null, $recurent_bill = 0
    const ADD_EXPENCE = "INSERT INTO transactions (account_id, `amount`, exp_inc, category_id, user_id, description, recurent_bill) VALUES (?, ?, ?, ?, ?, ?, ?)";
    const ADD_INCOME = "INSERT INTO transactions (user_email, `password`, first_name, last_name) VALUES (?, ?, ?, ?)";
    const GET_ALL_EXPENCE = "SELECT * FROM transactions WHERE user_id = ?";
    const GET_ALL_TRANSACTIONS_UID = "SELECT * FROM transactions WHERE user_id = ?";
    const GET_ALL_INCOME = "INSERT INTO transactions (user_email, `password`, first_name, last_name) VALUES (?, ?, ?, ?)";
    const GET_CURRENT_MONT ="
SELECT * FROM transactions
WHERE amount != ''
AND YEAR(date_time) = YEAR(NOW())
AND MONTH(date_time) = MONTH(NOW());";

    public function addExpence(Transaction $uid){

        $stm = $this->pdo->prepare(self::ADD_EXPENCE);
        //$stm->execute([$uid->getAccountId(), $uid->getUserId(), $uid->getAmount(), $uid->getExpInc(), $uid->getCategoryId(), $uid->getUserId(), $uid->getDescription(), $uid->getRecurentBill() ]);
        $stm->execute([$uid->getAccountId(), $uid->getUserId(), $uid->getAmount(), $uid->getExpInc(), $uid->getCategoryId(), $uid->getUserId(), $uid->getDescription(), $uid->getRecurentBill() ]);
        $result = $stm->fetchAll(\PDO::FETCH_ASSOC);
        return $result;
    }
    public function getAllTransactionsByUid($uid) {
        $sql = "SELECT * FROM transactions WHERE user_id = ?";
        $stm = $this->pdo->prepare($sql);
        //$stm->execute([$uid->getAccountId(), $uid->getUserId(), $uid->getAmount(), $uid->getExpInc(), $uid->getCategoryId(), $uid->getUserId(), $uid->getDescription(), $uid->getRecurentBill() ]);
        //$stm->execute([$uid->getUserId()]);
        $stm->execute([$uid]);
        $resulta = $stm->fetchAll(\PDO::FETCH_ASSOC);
        return $resulta;
    }

}

