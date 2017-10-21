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
    private $start_cash;
    private $currency;

    //public function __construct($account_name, $amount, $owner_id = null){
      public function __construct($owner_id){
        //$this->account_name = $account_name;
       $this->account_name = "cash";
       //$this->amount = $amount;
        $this->amount = 0;
        $this->owner_id = $owner_id;
        $this->start_cash = 0;
        $this->currency = 'EU';
    }

    /**
     * @return mixed
     */
    public function getAccountId()
    {
        return $this->account_id;
    }

    /**
     * @param mixed $account_id
     */
    public function setAccountId($account_id)
    {
        $this->account_id = $account_id;
    }

    /**
     * @return string
     */
    public function getAccountName()
    {
        return $this->account_name;
    }

    /**
     * @param string $account_name
     */
    public function setAccountName($account_name)
    {
        $this->account_name = $account_name;
    }

    /**
     * @return mixed
     */
    public function getAmount()
    {
        return $this->amount;
    }

    /**
     * @param mixed $amount
     */
    public function setAmount($amount)
    {
        $this->amount = $amount;
    }

    /**
     * @return mixed
     */
    public function getOwnerId()
    {
        return $this->owner_id;
    }

    /**
     * @param mixed $owner_id
     */
    public function setOwnerId($owner_id)
    {
        $this->owner_id = $owner_id;
    }

    /**
     * @return int
     */
    public function getStartCash()
    {
        return $this->start_cash;
    }

    /**
     * @param int $start_cash
     */
    public function setStartCash($start_cash)
    {
        $this->start_cash = $start_cash;
    }

    /**
     * @return string
     */
    public function getCurrency()
    {
        return $this->currency;
    }

    /**
     * @param string $currency
     */
    public function setCurrency($currency)
    {
        $this->currency = $currency;
    }
}