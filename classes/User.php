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
    private $disable;

    private $adeliNumber;
    private $password;
    private $firstName;
    private $lastName;
    private $mail;
    private $groups;
    private $validDate;
    private $askValidation;

    private $address;
    private $complementAddress;

    private $town;
    private $cp;

    private $mailer;

    private $hash;

    private $levelFormation;
    private $formationDate;

    private $phonePro;
    private $phoneMobile;
    private $newsletter;

    public function __construct($adeliNumber='', $password='') {
        date_default_timezone_set('UTC');

        $this->adeliNumber = $adeliNumber;
        $this->password = $password;
        $this->groups = array();
        $this->mailer = array();
    }
    public function setCookie() {
        setcookie("user", $this->adeliNumber.'/-!!-/'.$this->password, time()+3600*24*30*6); // expire in 6 month
    }

    public function clearCookie() {
        if(isset($_COOKIE['user'])) {
            unset($_COOKIE['user']);
            setcookie('user', '', time()-300);
        }
    }

    public function autoConnect() {
        if(isset($_COOKIE['user'])) {
            $info = explode('/-!!-/', $_COOKIE['user']);
            $this->adeliNumber = $info[0];
            $this->password = $info[1];
            return $this->connect(true);
        }
        return false;
    }

    public function connect($auto=false)
    {
        $ret = true;
        $db = new DatabaseUser();

        $data = $db->getUser($this->adeliNumber, $this->password);

        if($data == null) {
            $ret = false;
        }
        if($data != null ) {
            if (!password_verify($this->password, $data->password)) {
                $ret = false;
            }
        }

        if(!$ret) {
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
    public function sendForgetPassword() {
        $mailer = new Mailer();
        $mailer->isHTML(true);                                  // Set email format to HTML
        $mailer->Subject .= "Mot de passe oublié";

        $this->setHash(sha1(md5($this->getMail()." Oups ×D ".$this->getAdeliNumber()." Dommage =þ ".$this->getLastName(). " !". time())));
        $this->commit();
        $mailer->Body = (Mail::getForgetPassword($this->firstName." ".$this->lastName, "u=".$this->getId()."&s=".
            $this->getHash()));
        $mailer->addAddress($this->mail, $this->firstName." ".$this->lastName);
        $mailer->send();

    }
    public function valid() {
        $currentDate = new DateTime();
        $this->disable = 0;
        $year = $currentDate->format("Y");
        if($currentDate->format("M") != 1 && $currentDate->format("M") != 2) {
            $newDate = new DateTime(($year+1).'-2-28');
        } else {
            $newDate = new DateTime(($year+2).'-2-28');
        }
        $this->validDate = $newDate;

        $this->mailer[] = new Mailer();
        end($this->mailer)->isHTML(true);                                  // Set email format to HTML
        end($this->mailer)->Subject .= "Validation inscription";
        end($this->mailer)->Body = (Mail::getValidationRegistrationMail($this, $newDate->format("d/m/Y")));
        end($this->mailer)->addAddress($this->mail, $this->firstName." ".$this->lastName);
    }

    public function unvalid()
    {
        $this->validDate = NULL;
        $this->disable = 1;
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
        $this->validDate = new DateTime($data->validDate);
        $this->password = $data->password;
        $this->adeliNumber = $data->adeliNumber;
        $this->askValidation = new DateTime($data->askValidation);
        $this->hash = $data->forget;
        $this->address = $data->address;
        $this->complementAddress = $data->complementAddress;
        $this->town = $data->town;
        $this->cp = $data->cp;
        $this->hash = $data->forget;
        $this->formationDate = new DateTime($data->formationDate);
        $this->levelFormation = $data->levelFormation;
        $this->phoneMobile = $data->phoneMobile;
        $this->phonePro = $data->phonePro;
        $this->newsletter = $data->newsletter;
        $this->disable = $data->disable;

        $db = new DatabaseUser();
        $dataGroups = $db->getGroups($this->id);
        $this->groups = array();
        foreach($dataGroups as $group) {
            $this->groups[] = new Group($group['idGroup'], $group['nom']);
        }
    }

    public function toHtml() {
        $ret = '';
        $ret .= 'Numéro ADELI <b>'.$this->getAdeliNumber().'</b>';

        $ret .= '<h2>Contact</h2>';
        $ret .= $this->getMail().'</br>';
        $ret .= '<i class="glyphicon glyphicon-earphone"></i>&nbsp;<b>Téléphone professionnel: </b>'.$this->getPhonePro().'</br>';
        $ret .= '<i class="glyphicon glyphicon-phone"></i>&nbsp;<b>Téléphone portable: </b>'.$this->getPhoneMobile().'</br>';
        $ret .= '<h2>Adresse</h2>';
        $ret .= '<i class="glyphicon glyphicon-envelope"></i>&nbsp;'.$this->address.'<br/>'.($this->complementAddress!=""?$this->complementAddress.'<br/>':"").$this->cp.' '.$this->town;
        $ret .= '<h2>Formation MDT</h2>';
        $ret .= '<b>Niveau de formation</b>: '.$this->levelFormation.'<br/>';
        $ret .= '<i class="glyphicon glyphicon-calendar"></i>&nbsp;<b>Date de validation</b>: '.$this->validDate->format("m / Y");
        $ret .= '<H2>Newsletter</H2>';
        $ret .= $this->newsletter ? '<i style="color: green" class="glyphicon glyphicon-ok"></i>&nbsp;Reçoit la newsletter' : '<i class="glyphicon glyphicon-remove" style="color: red;"></i>&nbsp;Ne reçoit pas la newsletter';
        return $ret;
    }

    public function getHash() {
        return $this->hash;
    }

    public function setHash($h) {
        $this->hash = $h;
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
        return utf8_encode($this->firstName);
    }

    /**
     * @param mixed $firstName
     */
    public function setFirstName($firstName)
    {
        $this->firstName = ($firstName);
    }

    /**
     * @return mixed
     */
    public function getLastName()
    {
        return utf8_encode($this->lastName);
    }

    /**
     * @param mixed $lastName
     */
    public function setLastName($lastName)
    {
        $this->lastName = ($lastName);
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
        return ($this->address);
    }

    /**
     * @param mixed $address
     */
    public function setAddress($address)
    {
        $this->address = ($address);
    }

    /**
     * @return mixed
     */
    public function getTown()
    {
        return ($this->town);
    }

    /**
     * @param mixed $town
     */
    public function setTown($town)
    {
        $this->town = ($town);
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

    /**
     * @return mixed
     */
    public function getLevelFormation()
    {
        return $this->levelFormation;
    }

    /**
     * @param mixed $levelFormation
     */
    public function setLevelFormation($levelFormation)
    {
        $this->levelFormation = $levelFormation;
    }

    /**
     * @return mixed
     */
    public function getFormationDate()
    {
        return $this->formationDate;
    }

    /**
     * @param mixed $formationDate
     */
    public function setFormationDate($formationDate)
    {
        $this->formationDate = $formationDate;
    }

    /**
     * @return mixed
     */
    public function getPhonePro()
    {
        return $this->phonePro;
    }

    /**
     * @param mixed $phonePro
     */
    public function setPhonePro($phonePro)
    {
        $this->phonePro = $phonePro;
    }

    /**
     * @return mixed
     */
    public function getPhoneMobile()
    {
        return $this->phoneMobile;
    }

    /**
     * @param mixed $phoneMobile
     */
    public function setPhoneMobile($phoneMobile)
    {
        $this->phoneMobile = $phoneMobile;
    }

    /**
     * @return mixed
     */
    public function getNewsletter()
    {
        return $this->newsletter;
    }

    /**
     * @param mixed $newsletter
     */
    public function setNewsletter($newsletter)
    {
        $this->newsletter = $newsletter;
    }

    /**
     * @return mixed
     */
    public function getComplementAddress()
    {
        return ($this->complementAddress);
    }

    /**
     * @param mixed $complementAddress
     */
    public function setComplementAddress($complementAddress)
    {
        $this->complementAddress = ($complementAddress);
    }

    /**
     * @return mixed
     */
    public function getDisable()
    {
        return $this->disable;
    }

    /**
     * @param mixed $disable
     */
    public function setDisable($disable)
    {
        $this->disable = $disable;
    }


}