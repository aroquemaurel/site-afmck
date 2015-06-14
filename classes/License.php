<?php
/**
 * Created by PhpStorm.
 * User: aroquemaurel
 * Date: 14/06/15
 * Time: 21:01
 */

class License {
    private $user;
    private $date;
    private $key;

    function __construct(User $user, Date $date)
    {
        $this->user = $user;
        $this->date = $date;
    }

    public function commit() {
        $db = new DatabaseLicense();
        $key = $this->calculKey();
        $db->addLicense($this);
        return true;
    }

    public function hydrat($data) {
        $this->user = new User($data->idUser);
        $this->date = $data->dateAsking;
        $this->key = $data->key;
    }

    public function calculKey() {
        return 42;
    }

    /**
     * @return User
     */
    public function getUser()
    {
        return $this->user;
    }

    /**
     * @param User $user
     */
    public function setUser($user)
    {
        $this->user = $user;
    }

    /**
     * @return Date
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * @param Date $date
     */
    public function setDate($date)
    {
        $this->date = $date;
    }

    /**
     * @return mixed
     */
    public function getKey()
    {
        return $this->key;
    }

    /**
     * @param mixed $key
     */
    public function setKey($key)
    {
        $this->key = $key;
    }



}