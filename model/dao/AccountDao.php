<?php
/**
 * Created by PhpStorm.
 * User: assen.kovachev
 * Date: 21.10.2017 г.
 * Time: 03:23 ч.
 */

namespace model\dao;

//include "../DBManager.php";
use model\Accounts;
use model\DBManager;

class AccountDao
{
    private static $instance;
    private $pdo;

    private function __construct()    {
        $this->pdo = DBManager::getInstance()->getConnection();
    }

    public static function getAInstance(){
        if(self::$instance === null){
            self::$instance = new AccountDao();
        }
        return self::$instance;
    }
    const GET_USER_ACCOUNTS = "
SELECT u.first_name, u.last_name, a.account_id, a.account_name, round(a.ammount,2) as `ammount`, a.account_desc FROM users AS u
INNER JOIN accounts AS a
ON u.user_id = a.owner_id
WHERE u.user_id = ?";
    const ADD_NEW_USER_ACCOUNTS = "INSERT INTO accounts (account_name, ammount, account_desc, owner_id) VALUES (?,?,?,?)";
    const SELECT_USER_SUM_AMMOUNT = "SELECT round(sum(ammount),2) as total, currency FROM accounts as a WHERE owner_id = ?";
    const GET_USER_ACCOUNT_INFO_BY_ID = "SELECT * FROM accounts WHERE account_id = ?";

    public function getUserAcountsList($uid) {
            $stm = $this->pdo->prepare(self::GET_USER_ACCOUNTS);
            $stm->execute(array($uid));
            $result = $stm->fetchAll(\PDO::FETCH_ASSOC);
            return $result;
    }

    public function updateAccountAfterTransaction($ammount, $aid) {
        $sql = "UPDATE accounts SET ammount = ? WHERE account_id = ?";
        $stm = $this->pdo->prepare($sql);
        $stm->execute([$ammount, $aid]);
        return;
    }

//    public function addNewAccount(AccountDao $a) {
//        try {
//            $sql = "INSERT INTO accounts (account_name, ammount, account_desc, owner_id) VALUES (?,?,?,?)";
//            $stm = $this->pdo->prepare($sql);
//            $stm->execute(array());
//            //$result = $stm->fetchAll(\PDO::FETCH_ASSOC);
//            //return $result;
//            $lastInsertId = $this->pdo->lastInsertId();
//        }
//        catch (\PDOException $e) {
//            echo "Error add account: " . $e->getMessage();
//        }
//    }

    public  function getUserTotalAmmount(Accounts $a){
            try {
                $stm = $this->pdo->prepare(self::SELECT_USER_SUM_AMMOUNT);
                $stm->execute(array($a->getOwnerId()));
                $result = $stm->fetch(\PDO::FETCH_ASSOC);
                return $result;
            }
            catch (\PDOException $e) {
                echo "Err accounts list: " . $e->getMessage();
            }
        }
        public  function getUserAccountById(Accounts $a){
            try {
                $stm = $this->pdo->prepare(self::GET_USER_ACCOUNT_INFO_BY_ID);
                $stm->execute(array($a->getAccountId()));
                $result = $stm->fetch(\PDO::FETCH_ASSOC);
                return $result;
            }
            catch (\PDOException $e) {
                echo "Err accounts list: " . $e->getMessage();
            }
        }
    public  function getUserAccountById2($aid){
        try {
            $stm = $this->pdo->prepare(self::GET_USER_ACCOUNT_INFO_BY_ID);
            $stm->execute(array($aid));
            $result = $stm->fetch(\PDO::FETCH_ASSOC);
            return $result;
        }
        catch (\PDOException $e) {
            echo "Err accounts list: " . $e->getMessage();
        }
    }

}