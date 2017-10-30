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

    const GET_ALL_EXPENCE = "SELECT * FROM transactions WHERE user_id = ?";
    const GET_ALL_TRANSACTIONS_UID = "SELECT * FROM transactions WHERE user_id = ?";
    const GET_ALL_INCOME = "INSERT INTO transactions (user_email, `password`, first_name, last_name) VALUES (?, ?, ?, ?)";
    const GET_CURRENT_MONT ="
SELECT * FROM transactions
WHERE amount != ''
AND YEAR(date_time) = YEAR(NOW())
AND MONTH(date_time) = MONTH(NOW());";

    const GET_ALL_EXP_TODAY = "SELECT t.user_id, t.date_time, t.transaction_id, t.amount, t.exp_inc, t.category_id, t.description, recurent_bill,
a.account_id, a.account_name, a.ammount, u.first_name, u.last_name, ca.category_name FROM transactions as t
JOIN `accounts` as a
ON a.account_id = t.account_id
JOIN users as u
ON a.owner_id = u.user_id
JOIN categories as ca
ON t.category_id = ca.category_id
WHERE DATE(`date_time`) = CURDATE() and u.user_id = ? AND t.exp_inc = 'exp'
ORDER BY t.date_time DESC";

    public function addExpence(Transaction $uid){

        $stm = $this->pdo->prepare(self::ADD_EXPENCE);
        //$stm->execute([$uid->getAccountId(), $uid->getUserId(), $uid->getAmount(), $uid->getExpInc(), $uid->getCategoryId(), $uid->getUserId(), $uid->getDescription(), $uid->getRecurentBill() ]);
        $stm->execute([$uid->getAccountId(), $uid->getAmount(), $uid->getExpInc(), $uid->getCategoryId(), $uid->getUserId(), $uid->getDescription(), $uid->getRecurentBill()]);
        //$result = $stm->fetchAll(\PDO::FETCH_ASSOC);
        //return $result;
    }
    const ADD_INCOME = "INSERT INTO transactions (account_id, `amount`, exp_inc, category_id, description, recurent_bill, user_id) VALUES (?, ?, ?, ?, ?, ?, ?)";

    public function addIncome(Transaction $uid){
        $stm = $this->pdo->prepare(self::ADD_INCOME);
        $stm->execute([$uid->getAccountId(), $uid->getAmount(), $uid->getExpInc(), $uid->getCategoryId(), $uid->getDescription(), $uid->getRecurentBill(), $uid->getUserId()]);
        //$result = $stm->fetchAll(\PDO::FETCH_ASSOC);
        return true;
    }

    public function getAllTransactionsByUid($uid) {
        //$sql = "SELECT * FROM transactions WHERE user_id = ?";
        $sql = "SELECT t.user_id, t.date_time, t.transaction_id, t.amount, t.exp_inc, t.category_id, t.description, recurent_bill,
a.account_id, a.account_name, a.ammount, u.first_name, u.last_name, ca.category_name FROM transactions as t
JOIN `accounts` as a
ON a.account_id = t.account_id
JOIN users as u
ON a.owner_id = u.user_id
JOIN categories as ca
ON t.category_id = ca.category_id
WHERE u.user_id = 26
ORDER BY t.date_time DESC";

        $stm = $this->pdo->prepare($sql);
        $stm->execute([$uid]);
        $resulta = $stm->fetchAll(\PDO::FETCH_ASSOC);
        return $resulta;
    }
    public function getExpToday($uid) {
        $stm = $this->pdo->prepare(self::GET_ALL_EXP_TODAY);
        $stm->execute([$uid]);
        $result = $stm->fetchAll(\PDO::FETCH_ASSOC);
        return $result;

    }

    public function getExpTodayOr($date, $uid) {
        $sqla = "SELECT * FROM `transactions` WHERE ? AND user_id = ?";
        $stm = $this->pdo->prepare($sqla);
        $stm->execute([$date, $uid]);
        $result = $stm->fetchAll(\PDO::FETCH_ASSOC);
        return $result;
    }


}

