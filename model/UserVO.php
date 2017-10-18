<?php

namespace model;
/**
 * Created by PhpStorm.
 * User: assen.kovachev
 * Date: 16.10.2017 г.
 * Time: 22:26 ч.
 */
class UserVO
{
    private $user_id;
    private $user_email;
    private $password;
    private $first_name;
    private $last_name;
    private $user_pic;
    private $activated;

    //public function __construct($user_email, $password, $first_name, $last_name, $user_pic = null)
//    public function __construct()
//    {
//        $this->user_email = $user_email;
//        $this->password = $password;
//        $this->first_name = $first_name;
//        $this->last_name = $last_name;
//        $this->user_pic = $user_pic;
//    }

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

    /**
     * @return mixed
     */
    public function getUserEmail()
    {
        return $this->user_email;
    }

    /**
     * @param mixed $user_email
     */
    public function setUserEmail($user_email)
    {
        $this->user_email = $user_email;
    }

    /**
     * @return mixed
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * @param mixed $password
     */
    public function setPassword($password)
    {
        $this->password = $password;
    }

    /**
     * @return mixed
     */
    public function getFirstName()
    {
        return $this->first_name;
    }

    /**
     * @param mixed $first_name
     */
    public function setFirstName($first_name)
    {
        $this->first_name = $first_name;
    }

    /**
     * @return mixed
     */
    public function getLastName()
    {
        return $this->last_name;
    }

    /**
     * @param mixed $last_name
     */
    public function setLastName($last_name)
    {
        $this->last_name = $last_name;
    }

    /**
     * @return mixed
     */
    public function getUserPic()
    {
        return $this->user_pic;
    }

    /**
     * @param mixed $user_pic
     */
    public function setUserPic($user_pic)
    {
        $this->user_pic = $user_pic;
    }

    /**
     * @return mixed
     */
    public function getActivated()
    {
        return $this->activated;
    }

    /**
     * @param mixed $activated
     */
    public function setActivated($activated)
    {
        $this->activated = $activated;
    }

}