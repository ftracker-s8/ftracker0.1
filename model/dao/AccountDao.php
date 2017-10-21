<?php
/**
 * Created by PhpStorm.
 * User: assen.kovachev
 * Date: 21.10.2017 г.
 * Time: 03:23 ч.
 */

namespace model\dao;


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
SELECT u.first_name, u.last_name, a.account_name, a.ammount FROM id3203367_s8ftracker_db.users AS u
INNER JOIN accounts AS a
ON u.user_id = a.owner_id
WHERE u.user_id = ?";

    public function getUserAcountsList(Accounts $a) {
        $stm = $this->pdo->prepare(self::GET_USER_ACCOUNTS);
        $stm->execute(array($a->getOwnerId()));
        $result = $stm->fetchAll(\PDO::FETCH_ASSOC);
        return $result;

    }


}