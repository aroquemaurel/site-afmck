<?php
/**
 * Created by PhpStorm.
 * User: aroquemaurel
 * Date: 03/12/14
 * Time: 22:19
 */

class User {
    private $adeliNumber;
    private $password;
    private $firstName;
    private $lastName;
    private $mail;
    private $groups;

    public function __construct($adeliNumber, $password) {
        $this->adeliNumber = $adeliNumber;
        $this->password = $password;
    }

    public function connect()
    {
        $db = new DatabaseUser();
        $data = $db->getUser($this->adeliNumber, $this->password);
        if(!$data == null) {
            return false;
        }

        $this->hydrat($data);
        return true;
    }

    public function hydrat($data) {
        $this->lastName = $data->lastname;
        $this->firstName = $data->firstname;
        $this->mail = $data->mail;

        // TODO getGroups
    }

    /**
     * @return mixed
     */
    public function getAdeliNumber()
    {
        return $this->adeliNumber;
    }

    /**
     * @param mixed $adeliNumber
     */
    public function setAdeliNumber($adeliNumber)
    {
        $this->adeliNumber = $adeliNumber;
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
        return $this->firstName;
    }

    /**
     * @param mixed $firstName
     */
    public function setFirstName($firstName)
    {
        $this->firstName = $firstName;
    }

    /**
     * @return mixed
     */
    public function getLastName()
    {
        return $this->lastName;
    }

    /**
     * @param mixed $lastName
     */
    public function setLastName($lastName)
    {
        $this->lastName = $lastName;
    }

    /**
     * @return mixed
     */
    public function getMail()
    {
        return $this->mail;
    }

    /**
     * @param mixed $mail
     */
    public function setMail($mail)
    {
        $this->mail = $mail;
    }

    /**
     * @param $group
     */
     public function addGroup($group) {
        // TODO
     }

    /**
     * @param $group
     */
    public function removeGroup($group) {
        // TODO
    }

    /**
     * @return mixed
     */
    public function getGroups() {
        return $this->groups;
    }

    /**
     * @param $group
     */
    public function setGroups($group) {
        $this->groups = $group;
    }

}