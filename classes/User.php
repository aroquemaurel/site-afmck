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

    private $hashPassword;

    private $levelFormation;
    private $formationDate;

    private $phonePro;
    private $phoneMobile;
    private $newsletter;

    private $mailValidation;
    private $payment;
    private $hashMail;

    private $valuePaid;

    private $longitude;
    private $latitude;

    private $hasSigned;

    public function __construct($adeliNumber='', $password='') {
        date_default_timezone_set('UTC');

        $this->adeliNumber = $adeliNumber;
        $this->password = $password;
        $this->groups = array();
        $this->mailer = array();
        $this->hasSigned = -1;
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
        if(!$data->mailValidation) {
            $_SESSION['lastMessage'] = Popup::errorMessage("Votre adresse email n'a pas été validée");
            return false;
        } else if(strtotime($data->validDate) < time()) {
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
        $this->hashPassword = password_hash($this->mail.$this->adeliNumber, PASSWORD_BCRYPT, array("cost" =>utils\Utils::getOptimalCost(0.3)));

        $this->commit();
        $mailer->Body = (Mail::getForgetPassword($this->firstName." ".$this->lastName, "u=".$this->getId()."&s=".
            $this->getHashPassword()));
        $mailer->addAddress($this->mail, $this->firstName." ".$this->lastName);
        if(!$mailer->send()) {
            echo $mailer->ErrorInfo;
        }

    }

    public function mustSignedChart() {
        return $this->hasSigned == -1 && $this->levelFormation >= 4 && $this->mailValidation != 0
        && $this->disable!=1;
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
        $pdf = new BillingPdf($this);
        $pdf->generatePdf();

        $this->mailer[] = new Mailer();
        end($this->mailer)->isHTML(true);                                  // Set email format to HTML
        end($this->mailer)->Subject .= "Validation inscription";
        end($this->mailer)->Body = (Mail::getValidationRegistrationMail($this, $newDate->format("d/m/Y")));
        end($this->mailer)->addAddress($this->mail, $this->firstName." ".$this->lastName);
        end($this->mailer)->addAttachment(Visitor::getInstance()->getRootPath()."/docs/members/billing/".date("Y")."_".$this->getAdeliNumber().".pdf");
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
        $this->lastName = utf8_encode($data->lastname);
        $this->firstName = utf8_encode($data->firstname);
        $this->mail = utf8_encode($data->mail);
        $this->id = utf8_encode($data->id);
        $this->validDate = new DateTime($data->validDate);
        $this->password = utf8_encode($data->password);
        $this->adeliNumber = utf8_encode($data->adeliNumber);
        $this->askValidation = new DateTime($data->askValidation);
        $this->hash = utf8_encode($data->forget);
        $this->address = utf8_encode($data->address);
        $this->complementAddress = utf8_encode($data->complementAddress);
        $this->town = utf8_encode($data->town);
        $this->cp = utf8_encode($data->cp);
        $this->hash = utf8_encode($data->forget);
        $this->formationDate = new DateTime($data->formationDate);
        $this->levelFormation = utf8_encode($data->levelFormation);
        $this->phoneMobile = utf8_encode($data->phoneMobile);
        $this->phonePro = utf8_encode($data->phonePro);
        $this->newsletter = utf8_encode($data->newsletter);
        $this->disable = utf8_encode($data->disable);
        $this->payment = utf8_encode($data->payment);
        $this->hashMail = utf8_encode($data->hashMail);
        $this->mailValidation = utf8_encode($data->mailValidation);
        $this->valuePaid = utf8_encode($data->valuePaid);
        $this->hashPassword = $data->hashPassword;
        $this->longitude = $data->longitude;
        $this->latitude = $data->latitude;
        $this->hasSigned = $data->hasSigned;

        $db = new DatabaseUser();
        $dataGroups = $db->getGroups($this->id);
        $this->groups = array();
        foreach($dataGroups as $group) {
            $this->groups[] = new Group($group['idGroup'], $group['nom']);
        }
    }

    public function toHtml($pdf=false) {
        $ret = '';
        if($pdf) {
            $ret .= '<h1 style="font-size: 18pt">' . ($this->getFirstName()) . ' ' . ($this->getLastName()) . '</h1>';
        }
        $ret .= '<b>Numéro ADELI</b> '.$this->getAdeliNumber().'<br/>';

        $ret .= '<h2 style="font-size: 14pt">Contact</h2>';
        $ret .= '<i class="glyphicon glyphicon-envelope"></i>&nbsp;<b>Email</b> <a href="mailto:'.$this->getMail().'">'.strtolower($this->getMail()).'</a><br/>';
        $ret .= '<i class="glyphicon glyphicon-earphone"></i>&nbsp;<b>Téléphone professionnel: </b>'.$this->getPhonePro().'<br/>';
        $ret .= '<i class="glyphicon glyphicon-phone"></i>&nbsp;<b>Téléphone portable: </b>'.$this->getPhoneMobile().'<br/>';

        $ret .= '<h2 style="font-size: 14pt">Adresse</h2>';
        $ret .= '<i class="glyphicon glyphicon-envelope"></i>&nbsp;'.($this->address).'<br/>'.($this->complementAddress!=""?($this->complementAddress).'<br/>':"").$this->cp.' '.($this->town);
        $ret .= '<h2 style="font-size: 14pt">Formation MDT</h2>';
        $ret .= '<b>Niveau de formation</b>: '.$this->getLevelFormationString().'<br/>';
        $ret .= '<i class="glyphicon glyphicon-calendar"></i>&nbsp;<b>Date de validation</b>: '.$this->formationDate->format("m / Y");
        $ret .= '<H2 style="font-size: 14pt">Paiement</H2>';
        $ret .= 'Paiement par '.($this->payment == 1 ? "chèque":"virement bancaire") ."<br/> ";
        $ret .= 'Montant de la cotisation: '.($this->getValuePaid() != 100 ? $this->getValuePaid()." euros" : "100 euros et plus").'<br/>';
        if(!$pdf) {
            $ret .= 'Dernière facture: <i class="glyphicon glyphicon-download-alt"></i> <a href="'.Visitor::getInstance()->getRootPage().'/docs/members/billing/'.(new DateTime())->format('Y').'_'.$this->adeliNumber.'.pdf">Télécharger</a>';
        }
            $ret .= '<H2 style="font-size: 14pt">Newsletter</H2>';
        $ret .= $this->newsletter ? '<i style="color: green" class="glyphicon glyphicon-ok"></i>&nbsp;Reçoit la newsletter' : '<i class="glyphicon glyphicon-remove" style="color: red;"></i>&nbsp;Ne reçoit pas la newsletter';
        $ret .= '<H2 style="font-size: 14pt">Charte de bonne pratique</H2>';
        $ret .= $this->hasSigned == 1 ? '<i style="color: green" class="glyphicon glyphicon-ok"></i>&nbsp;À signé la charte' : '<i class="glyphicon glyphicon-remove" style="color: red;"></i>&nbsp;N\'a pas signé la charte';

        if($pdf) {
            $ret .= '<p style="font-size: 11pt; margin-top: 50px;">Signature<br/><br/>Le .... / .... / 2015<br/><br/>À ........................</p>';
        }
        return $ret;
    }

    public function getHashPassword() {
        return $this->hashPassword;
    }

    public function setHashPassword($h) {
        $this->hashPassword = $h;
    }

    /**
     * @return mixed
     */
    public function getValuePaid()
    {
        return $this->valuePaid;
    }

    /**
     * @return mixed
     */
    public function getHasSigned()
    {
        return $this->hasSigned;
    }

    /**
     * @param mixed $hasSigned
     */
    public function setHasSigned($hasSigned)
    {
        $this->hasSigned = $hasSigned;
    }


    /**
     * @param mixed $valuePaid
     */
    public function setValuePaid($valuePaid)
    {
        $this->valuePaid = $valuePaid;
    }

    /**
     * @return mixed
     */
    public function getHashMail()
    {
        return $this->hashMail;
    }

    /**
     * @param mixed $hashMail
     */
    public function setHashMail($hashMail)
    {
        $this->hashMail = $hashMail;
    }

    /**
     * @return mixed
     */
    public function getAdeliNumber()
    {
        return $this->adeliNumber;
    }

    /**
     * @return mixed
     */
    public function getPayment()
    {
        return $this->payment;
    }

    /**
     * @param mixed $payment
     */
    public function setPayment($payment)
    {
        $this->payment = $payment;
    }

    /**
     * @return mixed
     */
    public function getLongitude()
    {
        return $this->longitude;
    }

    /**
     * @param mixed $longitude
     */
    public function setLongitude($longitude)
    {
        $this->longitude = $longitude;
    }

    /**
     * @return mixed
     */
    public function getLatitude()
    {
        return $this->latitude;
    }

    /**
     * @param mixed $latitude
     */
    public function setLatitude($latitude)
    {
        $this->latitude = $latitude;
    }

    /**
     * @return mixed
     */
    public function getMailValidation()
    {
        return $this->mailValidation;
    }

    /**
     * @param mixed $mailValidation
     */
    public function setMailValidation($mailValidation)
    {
        $this->mailValidation = $mailValidation;
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
        return ucfirst(strtolower($this->firstName));
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
        return strtoupper($this->lastName);
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
        return strtolower($this->mail);
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
        return strtoupper($this->town);
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

    public function getLevelFormationString() {
        switch($this->levelFormation) {
            case 1:
                return "A";
            case 2:
                return "B";
            case 3:
                return "C";
            case 4:
                return "D";
            case 5:
                return 'Certifié';
            case 6:
                return "Diplômé";
        }
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
