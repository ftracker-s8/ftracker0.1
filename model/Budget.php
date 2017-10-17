<?php
/**
 * Created by PhpStorm.
 * User: izi
 * Date: 15.10.2017 г.
 * Time: 17:27
 */

namespace model;

class Budget
{
    private $budget_id;
    private $bud_name;
    private $bud_category;
    private $start_date;
    private $end_date;
    private $owner_id;


    public function __construct($bud_name, $bud_category, $start_date, $end_date,$owner_id){
        $this->bud_name = $bud_name;
        $this->bud_category = $bud_category;
        $this->start_date = $start_date;
        $this->end_date = $end_date;
        $this->owner_id = $owner_id;
    }
    /**
     * @return mixed
     */
    public function getBudCategory(){
        return $this->bud_category;
    }

    /**
     * @return mixed
     */
    public function getBudgetId(){
        return $this->budget_id;
    }

    /**
     * @return mixed
     */
    public function getEndDate(){
        return $this->end_date;
    }

    /**
     * @return mixed
     */
    public function getOwnerId(){
        return $this->owner_id;
    }

    /**
     * @return mixed
     */
    public function getBudName(){
        return $this->bud_name;
    }

    /**
     * @return mixed
     */
    public function getStartDate(){
        return $this->start_date;
    }

    /**
     * @param mixed $budget_id
     */
    public function setBudgetId($budget_id){
        $this->budget_id = $budget_id;
    }
}