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
    private $type;
    private $category_id;
    private $description;

    public function __construct($date_time, $account_id, $amount, $type, $category_id, $description=null){
        $this->date_time = $date_time;
        $this->account_id = $account_id;
        $this->amount = $amount;
        $this->type = $type;
        $this->category_id = $category_id;
        $this->description = $description;
    }

    /**
     * @return mixed
     */
    public function getDateTime(){
        return $this->date_time;
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
    public function getAmount(){
        return $this->amount;
    }

    /**
     * @return mixed
     */
    public function getType(){
        return $this->type;
    }

    /**
     * @return mixed
     */
    public function getCategoryId(){
        return $this->category_id;
    }

    /**
     * @return null
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @return mixed
     */
    public function getTransactionId()
    {
        return $this->transaction_id;
    }
    public function setId($id){
        $this->transaction_id = $id;
    }
}