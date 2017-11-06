<?php
/**
 * Created by PhpStorm.
 * User: izi
 * Date: 15.10.2017 г.
 * Time: 17:06
 */

namespace model;


class Transaction
{
    private $transaction_id;
    private $date_time;
    private $account_id;
    private $amount;
    private $exp_inc;
    private $category_id;
    private $description;
    private $recurent_bill;
    private $user_id;
    private $next_update;

    public function __construct(){
        $this->pdo = DBManager::getInstance()->getConnection();
    }

    /**
     * @return mixed
     */
    public function getTransactionId()
    {
        return $this->transaction_id;
    }

     /**
     * @return mixed
     */
    public function getDateTime()
    {
        return $this->date_time;
    }

    /**
     * @return mixed
     */
    public function getNextUpdate()
    {
        return $this->next_update;
    }

    /**
     * @param mixed $next_update
     */
    public function setNextUpdate($next_update)
    {
        $this->next_update = $next_update;
    }

    /**
     * @param mixed $date_time
     */
    public function setDateTime($date_time)
    {
        $this->date_time = $date_time;
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
    public function getExpInc()
    {
        return $this->exp_inc;
    }

    /**
     * @param mixed $exp_inc
     */
    public function setExpInc($exp_inc)
    {
        $this->exp_inc = $exp_inc;
    }

    /**
     * @return mixed
     */
    public function getCategoryId()
    {
        return $this->category_id;
    }

    /**
     * @param mixed $category_id
     */
    public function setCategoryId($category_id)
    {
        $this->category_id = $category_id;
    }

    /**
     * @return mixed
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @param mixed $description
     */
    public function setDescription($description)
    {
        $this->description = $description;
    }

    /**
     * @return mixed
     */
    public function getRecurentBill()
    {
        return $this->recurent_bill;
    }

    /**
     * @param mixed $recurent_bill
     */
    public function setRecurentBill($recurent_bill)
    {
        $this->recurent_bill = $recurent_bill;
    }

    /**
     * @return mixed
     */
    public function getUserId()
    {
        return $this->user_id;
    }

    /**
     * @param mixed $user_id
     */
    public function setUserId($user_id)
    {
        $this->user_id = $user_id;
    }


}