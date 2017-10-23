<?php
/**
 * Created by PhpStorm.
 * User: Sheilly
 * Date: 19.10.2017 г.
 * Time: 13:17 ч.
 */

namespace model;

class UserCategories
{
    private $uc_id;
    private $user_cat_color;
    private $user_cat_icon;
    private $user_cat_name;
    private $user_id;

    public function __construct(){
        //$this->user_id = $user_id;
    }

    /**
     * @return mixed
     */
    public function getUserCatColor()
    {
        return $this->user_cat_color;
    }

    /**
     * @param mixed $user_cat_color
     */
    public function setUserCatColor($user_cat_color)
    {
        $this->user_cat_color = $user_cat_color;
    }

    /**
     * @return mixed
     */
    public function getUserCatIcon()
    {
        return $this->user_cat_icon;
    }

    /**
     * @param mixed $user_cat_icon
     */
    public function setUserCatIcon($user_cat_icon)
    {
        $this->user_cat_icon = $user_cat_icon;
    }

    /**
     * @return mixed
     */
    public function getUserCatName()
    {
        return $this->user_cat_name;
    }

    /**
     * @param mixed $user_cat_name
     */
    public function setUserCatName($user_cat_name)
    {
        $this->user_cat_name = $user_cat_name;
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