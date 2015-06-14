<?php
/**
 * Created by PhpStorm.
 * User: aroquemaurel
 * Date: 14/06/15
 * Time: 21:01
 */

class License {
    private $user;
    private $askingDate;
    private $validDate;
    private $key;
    private $toAdd;
    function __construct(User $user)
    {
        $this->user = $user;
        $db = new DatabaseLicense();
        $data = $db->getLicense($this->user);
        if($data != null) {
            $this->hydrat($data);
            $this->toAdd = $this->validDate < new DateTime();
        } else {
            $this->askingDate = new DateTime();
            $this->key = $this->calculKey();
            $this->toAdd = true;
        }
    }
    public function getValidDate() {
        $year = intval($this->askingDate->format("Y"));
        if($this->askingDate->format("M") != 1 && $this->askingDate->format("M") != 2) {
            $validDate = new DateTime(($year+1).'-2-28');
        } else {
            $validDate = new DateTime(($year+2).'-2-28');
        }

        return $validDate;
    }
    public function commit() {
        $db = new DatabaseLicense();
        if($this->toAdd) {
            $this->askingDate = new DateTime();
            $db->addLicense($this);
        }
    }

    public function hydrat($data) {
        $db = new DatabaseUser();
        $this->user = $db->getUserById($data->idUser);
        $this->askingDate = new DateTime($data->dateAsking);
        $this->key = $data->key;
        $this->validDate = $this->getValidDate();
    }

    public function calculKey() {
        return 42 + intval($this->askingDate->format("Y"));
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
    public function getAskingDate()
    {
        return $this->askingDate;
    }

    /**
     * @param Date $askingDate
     */
    public function setAskingDate($askingDate)
    {
        $this->askingDate = $askingDate;
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