<?php
use models\Group;

/**
 * Created by PhpStorm.
 * User: aroquemaurel
 * Date: 03/12/14
 * Time: 22:19
 */

class User {
    private $id;
    private $adeliNumber;
    private $password;
    private $firstName;
    private $lastName;
    private $mail;
    private $groups;
    private $validDate;
    private $askValidation;

    public function __construct($adeliNumber='', $password='') {
        date_default_timezone_set('UTC');

        $this->adeliNumber = $adeliNumber;
        $this->password = $password;
        $this->groups = array();
    }

    public function connect()
    {
        $db = new DatabaseUser();
        $data = $db->getUser($this->adeliNumber, $this->password);
        if($data == null ) {
            $_SESSION['lastMessage'] = Popup::connectionKo();
            return false;
        }

        $this->hydrat($data);
        if(strtotime($data->validDate) < time()) {
            $_SESSION['lastMessage'] = Popup::disableAccount();
            return false;
        }

        if(strtotime($data->validDate) - time() < 1080000) {
            $buff = explode(' ', $data->validDate);
            $strDate = (new DateTime($buff[0]))->format('d/m/Y');
            $_SESSION['lastMessage'] = Popup::connectionOk().Popup::warningActivation($strDate);
            return true;
        }
        $_SESSION['lastMessage'] = Popup::connectionOk();
        return true;
    }

    public function insert()
    {
        $db = new DatabaseUser();
        $db->addUser($this);
    }
    public function valid() {
        $currentDate = new DateTime();
        $year = $currentDate->format("Y");
        if($currentDate->format("M") != 11 && $currentDate->format("M") != 12) {
            $newDate = new DateTime(($year+1).'-12-31');
        } else {
            $newDate = new DateTime(($year+2).'-12-31');
        }
        $this->validDate = $newDate;
    }

    public function unvalid()
    {
        $this->validDate = NULL;
    }

    public function commit() {
        $db = new DatabaseUser();
        $db->editUser($this);
    }
    public function hydrat($data) {
        $this->lastName = $data->lastname;
        $this->firstName = $data->firstname;
        $this->mail = $data->mail;
        $this->id = $data->id;
        $this->validDate = $data->validDate;
        $this->password = $data->password;
        $this->adeliNumber = $data->adeliNumber;
        $this->askValidation = $data->askValidation;
        $db = new DatabaseUser();
        $dataGroups = $db->getGroups($this->id);
        $this->groups = array();
        foreach($dataGroups as $group) {
            $this->groups[] = new Group($group['idGroup'], $group['nom']);
        }
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

    public function isInGroup($group) {
        foreach($this->groups as $gr) {
            if($gr->getName() == $group) {
                return true;
            }
        }

        return false;
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getAskValidation()
    {
        return $this->askValidation;
    }

    /**
     * @param mixed $askValidation
     */
    public function setAskValidation($askValidation)
    {
        $this->askValidation = $askValidation;
    }

    /**
     * @return mixed
     */
    public function getValidDate()
    {
        return $this->validDate;
    }

    /**
     * @param mixed $validDate
     */
    public function setValidDate($validDate)
    {
        $this->validDate = $validDate;
    }



}