<?php
/**
 * Created by PhpStorm.
 * User: izi
 * Date: 15.10.2017 г.
 * Time: 17:07
 */

namespace model;


class Accounts
{
    private $account_id;
    private $account_name;
    private $amount;
    private $owner_id;

    public function __construct($account_name, $amount, $owner_id){
        $this->account_name = $account_name;
        $this->amount = $amount;
        $this->owner_id = $owner_id;

    }

    /**
     * @return mixed
     */
    public function getAccountId(){
        return $this->account_id;
    }

    /**
     * @return mixed
     */
    public function getAccountName(){
        return $this->account_name;
    }
    /**
     * @return mixed
     */
    public function getAmount(){
        return $this->amount;
    }

    /**
     * @return mixed
     */
    public function getOwnerId(){
        return $this->owner_id;
    }

    /**
     * @param mixed $account_id
     */
    public function setAccountId($account_id){
        $this->account_id = $account_id;
    }
}