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

    private $address;
    private $town;
    private $cp;

    private $mailer;

    public function __construct($adeliNumber='', $password='') {
        date_default_timezone_set('UTC');

        $this->adeliNumber = $adeliNumber;
        $this->password = $password;
        $this->groups = array();
        $this->mailer = array();
    }
    public function setCookie() {
        setcookie("user", "123/-/456", time()+3600*24*30*6); // expire in 6 month
    }

    public function clearCookie() {
        if(isset($_COOKIE['user'])) {
            unset($_COOKIE['user']);
            setcookie('user', '', time()-300);
        }
    }

    public function autoConnect() {
        if(isset($_COOKIE['user'])) {
            $info = explode('/-/', $_COOKIE['user']);
            $this->adeliNumber = $info[0];
            $this->password = $info[1];
            return $this->connect(true);
        }
        return false;
    }

    public function connect($auto=false)
    {
        $db = new DatabaseUser();
        $data = $db->getUser($this->adeliNumber, $this->password);
        if($data == null ) {
            if(!$this->auto) {
                $_SESSION['lastMessage'] = Popup::connectionKo();
            } else {
                $this->clearCookie();
            }
            return false;
        }

        $this->hydrat($data);
        if(strtotime($data->validDate) < time()) {
            $_SESSION['lastMessage'] = Popup::disableAccount();
            if(auto) {
               $this->clearCookie();
            }
            return false;
        }

        if(strtotime($data->validDate) - time() < 1080000) {
            $buff = explode(' ', $data->validDate);
            $strDate = (new DateTime($buff[0]))->format('d/m/Y');
            $_SESSION['lastMessage'] = Popup::connectionOk();

            $_SESSION['lastMessage'] .= Popup::warningActivation($strDate);
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

        $this->mailer[] = new Mailer();
        end($this->mailer)->isHTML(true);                                  // Set email format to HTML
        end($this->mailer)->Subject .= "Validation inscription";
        end($this->mailer)->Body = utf8_decode(Mail::getValidationRegistrationMail($this->firstName." ".$this->lastName, $newDate->format("d/m/Y")));
        end($this->mailer)->addAddress($this->mail, $this->firstName." ".$this->lastName);
    }

    public function unvalid()
    {
        $this->validDate = NULL;
    }

    public function commit() {
        $db = new DatabaseUser();
        $db->editUser($this);
        if($this->mailer != null) {
            foreach($this->mailer as $mailer) {
                if(!$mailer->send()) {
                    $_SESSION['lastMessage'] = Popup::warningMessage("
                    Problème dans l'envoie du mail de confirmation, le compte à tout de même été validé.");
                    return false;
                }
            }
        }
        return true;

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

        $this->address = $data->address;
        $this->town = $data->town;
        $this->cp = $data->cp;

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

    /**
     * @return mixed
     */
    public function getAddress()
    {
        return $this->address;
    }

    /**
     * @param mixed $address
     */
    public function setAddress($address)
    {
        $this->address = $address;
    }

    /**
     * @return mixed
     */
    public function getTown()
    {
        return $this->town;
    }

    /**
     * @param mixed $town
     */
    public function setTown($town)
    {
        $this->town = $town;
    }

    /**
     * @return mixed
     */
    public function getCp()
    {
        return $this->cp;
    }

    /**
     * @param mixed $cp
     */
    public function setCp($cp)
    {
        $this->cp = $cp;
    }

}