<?php
/**
 * Created by PhpStorm.
 * User: assen.kovachev
 * Date: 22.10.2017 г.
 * Time: 22:17 ч.
 */

namespace model;


class Expenses
{
    //private $transaction_id;
    private $account_id;
    private $amount;
    private $type;
    private $category_id;
    private $description;
    private $recurent_bill;

    public function __construct() {

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
    public function getType()
    {
        return $this->type;
    }

    /**
     * @param mixed $type
     */
    public function setType($type)
    {
        $this->type = $type;
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

}