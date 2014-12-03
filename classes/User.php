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

    public function __construct($adeliNumber, $password) {
        $this->adeliNumber = $adeliNumber;
        $this->password = $password;
    }

    public function connect()
    {
        $db = new DatabaseConnection();
        return $db->connect($this);
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



}