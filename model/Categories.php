<?php
/**
 * Created by PhpStorm.
 * User: izi
 * Date: 15.10.2017 г.
 * Time: 17:39
 */

namespace model;


class Categories{
    private $category_id;
    private $category_name;
    private $icon_url;
    private $color;
    private $owner_id;

    public function __construct($category_name, $icon_url, $color, $owner_id = null){
        $this->category_name = $category_name;
        $this->icon_url = $icon_url;
        $this->color = $color;
        $this->owner_id = $owner_id;
    }

    public function getOwnerId(){
        return $this->owner_id;
    }
    /**
     * @return mixed
     */
    public function getColor(){
        return $this->color;
    }
    /**
     * @param mixed $category_id
     */
    public function setCategoryId($category_id){
        $this->category_id = $category_id;
    }
    /**
     * @return mixed
     */
    public function getCategoryId(){
        return $this->category_id;
    }

    /**
     * @return mixed
     */
    public function getCategoryName(){
        return $this->category_name;
    }

    /**
     * @return mixed
     */
    public function getIconUrl(){
        return $this->icon_url;
    }
}