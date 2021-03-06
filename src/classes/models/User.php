<?php
declare(strict_types = 1);

namespace models;

use BillingPdf;
use database\DatabaseNews;
use database\DatabaseUser;
use DateTime;
use Mail;
use Mailer;
use models\notifications\Notification;
use models\notifications\NotificationType;
use Popup;
use utils\NotificationHelper;
use Visitor;

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
    private $askReadhesion;

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

    public function __construct(string $adeliNumber='', string $password='') {
        date_default_timezone_set('UTC');

        $this->adeliNumber = $adeliNumber;
        $this->password = $password;
        $this->groups = array();
        $this->mailer = array();
        $this->hasSigned = -1;
        $this->payment = new PaymentType(0, $this);
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

    public function autoConnect() : bool {
        if(isset($_COOKIE['user'])) {
            $info = explode('/-!!-/', $_COOKIE['user']);
            $this->adeliNumber = $info[0];
            $this->password = $info[1];
            return $this->connect(true);
        }
        return false;
    }

    public static function passwordIsValid(string $adeliNumber, string $password) : bool {
        $db = new DatabaseUser();
        $data = $db->getUser($adeliNumber);

        return $data != null && password_verify($password, $data->password);
    }

    public function connect(bool $auto=false) : bool
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
        } else if($this->isActive()) {
            $_SESSION['lastMessage'] = Popup::disableAccount();
            if($auto) {
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

    public function isActive() : bool {
        return strtotime($this->validDate->format("Y-m-d")) < time();
    }

    public function insert()
    {
        $db = new DatabaseUser();
        $db->addUser($this);
    }
    public function sendForgetPassword() {
        $mailer = new Mailer();
        $mailer->isHTML(true);                                  // Set email format to HTML
        $mailer->CharSet = 'UTF-8';
        $mailer->Subject .= "Mot de passe oublié";
        $this->hashPassword = password_hash($this->mail.$this->adeliNumber, PASSWORD_BCRYPT, array("cost" =>\utils\Utils::getOptimalCost(0.3)));

        $this->commit();
        $mailer->Body = (Mail::getForgetPassword($this->firstName." ".$this->lastName, "u=".$this->getId()."&s=".
            $this->getHashPassword()));
        $mailer->addAddress($this->mail, $this->firstName." ".$this->lastName);
        if(!$mailer->send()) {
            echo $mailer->ErrorInfo;
        }

    }

    public function mustSignedChart() : bool {
        return $this->hasSigned == -1 && $this->levelFormation >= 4 && $this->mailValidation != 0
        && !$this->disable;
    }

    public function addNewsToSend(News $news) {
        $db = new DatabaseNews();
        $db->addNewsToSend($this->id, $news->getId(), new DateTime());
    }

    private function levelStringToInt(string $level) : int {
        $ret = 0;
        switch(strtoupper($level)) {
            case "A":
                $ret = 1;
                break;
            case "B":
                $ret = 2;
                break;
            case "C":
                $ret = 3;
                break;
            case "D":
                $ret = 4;
                break;
            case "CERTIFIÉ":
                $ret = 5;
                break;
            case "DIPLOMÉ":
                $ret = 6;
                break;
        }

        return $ret;
    }
    public function levelIsGreaterThan($level) : bool {
        return ($this->levelFormation >= $this->levelStringToInt($level));
    }

    public function valid() {
        $currentDate = new DateTime();
        $this->disable = false;
        $this->askReadhesion = NULL;
        $this->askValidation = NULL;
        $year = intval($currentDate->format("Y"));

        if($currentDate->format("m") != 11 && $currentDate->format("m") != 12) {
            $newDate = new DateTime(($year+1).'-1-01');
        } else {
            $newDate = new DateTime(($year+2).'-1-01');
        }
        $this->validDate = $newDate;
        $pdf = new BillingPdf($this);
        $pdf->generatePdf();

        $this->mailer[] = new Mailer();
        end($this->mailer)->isHTML(true);                                  // Set email format to HTML
        end($this->mailer)->CharSet = 'UTF-8';
        end($this->mailer)->Subject .= "Validation inscription";
        end($this->mailer)->Body = (Mail::getValidationRegistrationMail($this, $newDate->format("d/m/Y")));
        end($this->mailer)->addAddress($this->mail, $this->firstName." ".$this->lastName);
        end($this->mailer)->addAttachment(\Visitor::getRootPath()."/docs/members/billing/".date("Y")."_".$this->getAdeliNumber().".pdf");

        if($this->getHasSigned() == 1) {
            $this->mailer[] = new Mailer();
            end($this->mailer)->isHTML(true);                                  // Set email format to HTML
            end($this->mailer)->CharSet = 'UTF-8';
            end($this->mailer)->Subject .= "Signature d'une charte";
            end($this->mailer)->Body = (Mail::getNewChartMail($this));
            end($this->mailer)->addAddress(SECRETARIAT_MAIL, "Secrétariat AFMcK");
        }
    }

    public function isModerator() : bool {
        return $this->isInGroup("MODERATEUR") || $this->isInGroup("ADMINISTRATEUR");
    }

    public function unvalid()
    {
        $this->validDate = NULL;
        $this->disable = true;
    }

    public function commit() : bool {
        $db = new DatabaseUser();
        $db->editUser($this);
        if($this->mailer != null) {
            foreach($this->mailer as $mailer) {
                if(!$mailer->send()) {
//                    $_SESSION['lastMessage'] = Popup::warningMessage("
  //                  Problème dans l'envoie du mail de confirmation, le compte à tout de même été validé.");
    //                return false;
                }
            }
        }
        return true;

    }
    public function hydrat($data) {
        $this->lastName = utf8_encode($data->lastname);
        $this->firstName = utf8_encode($data->firstname);
        $this->mail = utf8_encode($data->mail);
        $this->id = intval($data->id);
        $this->validDate = new DateTime($data->validDate);
        $this->password = utf8_encode($data->password);
        $this->adeliNumber = utf8_encode($data->adeliNumber);
        $this->askValidation = $data->askValidation == NULL ? NULL : new DateTime($data->askValidation);
        $this->hash = utf8_encode($data->forget);
        $this->address = utf8_encode($data->address);
        $this->complementAddress = utf8_encode($data->complementAddress);
        $this->town = utf8_encode($data->town);
        $this->cp = intval($data->cp);
        $this->hash = utf8_encode($data->forget);
        $this->formationDate = new DateTime($data->formationDate);
        $this->levelFormation = intval($data->levelFormation);
        $this->phoneMobile = utf8_encode($data->phoneMobile);
        $this->phonePro = utf8_encode($data->phonePro);
        $this->newsletter = utf8_encode($data->newsletter);
        $this->disable = $data->disable == 1;
        $this->payment = new PaymentType(intval($data->payment));
        $this->hashMail = utf8_encode($data->hashMail);
        $this->mailValidation = utf8_encode($data->mailValidation);
        $this->valuePaid = intval($data->valuePaid);
        $this->hashPassword = $data->hashPassword;
        $this->longitude = doubleval($data->longitude);
        $this->latitude = doubleval($data->latitude);
        $this->hasSigned = intval($data->hasSigned);

        $this->askReadhesion = new DateTime($data->askReadhesion." 00:00:00");

        $db = new DatabaseUser();
        $dataGroups = $db->getGroups($this->id);
        $this->groups = array();
        foreach($dataGroups as $group) {
            $this->groups[] = new Group($group['idGroup'], $group['nom']);
        }
    }
    public function getCompleteAddress() : string {
        return ($this->address).'<br/>'.($this->complementAddress!=""?($this->complementAddress).'<br/>':"").$this->cp.' '.($this->town);
    }
    public function toHtml(bool $pdf=false) : string {
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
        $ret .= '<i class="glyphicon glyphicon-envelope"></i>&nbsp;'.$this->getCompleteAddress();
        $ret .= '<h2 style="font-size: 14pt">Formation MDT</h2>';
        $ret .= '<b>Niveau de formation</b>: '.$this->getLevelFormationString().'<br/>';
        $ret .= '<i class="glyphicon glyphicon-calendar"></i>&nbsp;<b>Date de validation</b>: '.$this->formationDate->format("m / Y");
        $ret .= '<H2 style="font-size: 14pt">Paiement</H2>';
        $ret .= 'Paiement par '.($this->payment->toString()) ."<br/> ";
        $ret .= 'Montant de la cotisation: '.($this->getValuePaid() != 100 ? $this->getValuePaid()." euros" : "100 euros et plus").'<br/>';
        if(!$pdf) {
            $ret .= 'Dernière facture: <i class="glyphicon glyphicon-download-alt"></i> <a href="'.Visitor::getRootPage().'/docs/members/billing/'.(new DateTime())->format('Y').'_'.$this->adeliNumber.'.pdf">Télécharger</a>';
        }
            $ret .= '<H2 style="font-size: 14pt">Newsletter</H2>';
        $ret .= $this->newsletter ? '<i style="color: green" class="glyphicon glyphicon-ok"></i>&nbsp;Reçoit la newsletter' : '<i class="glyphicon glyphicon-remove" style="color: red;"></i>&nbsp;Ne reçoit pas la newsletter';
        $ret .= '<H2 style="font-size: 14pt">Charte de bonne pratique</H2>';
        $ret .= $this->hasSigned == 1 ? '<i style="color: green" class="glyphicon glyphicon-ok"></i>&nbsp;À signé la charte' : '<i class="glyphicon glyphicon-remove" style="color: red;"></i>&nbsp;N\'a pas signé la charte';

        if($pdf) {
            $ret .= '<p style="font-size: 11pt; margin-top: 20px;">Signature <span style="margin-left: 40px"></span>Le .... / .... / '.date('Y').'<span style="margin-left:40px;"></span>À ........................</p>';
        }
        return $ret;
    }

    public function getAvatarPath() : string {
        return Visitor::getRootPath()."/docs/members/avatars/".$this->getAvatarFileName();
    }

    public function getAvatarFileName() : string {
        return $this->id."_".$this->adeliNumber.'.jpg';
    }

    public function getAvatar() : string {
        $theoricalPath = $this->getAvatarPath();
        $pageFolder = Visitor::getRootPage()."/docs/members/avatars/";
        if(!$this->hasDefaultAvatar()) {
            return $pageFolder.'/'.$this->getAvatarFileName();
        } else {
            return $pageFolder.'/default.jpg';
        }
    }

    public function hasDefaultAvatar() {
        $theoricalPath = $this->getAvatarPath();
        return !file_exists($theoricalPath);
    }

    public function getHashPassword() : string {
        return $this->hashPassword;
    }

    public function setHashPassword($h) {
        $this->hashPassword = $h;
    }

    /**
     * @return mixed
     */
    public function getValuePaid() : int
    {
        return intval($this->valuePaid);
    }

    /**
     * @return mixed
     */
    public function getHasSigned() : int
    {
        return $this->hasSigned;
    }

    /**
     * @param mixed $hasSigned
     */
    public function setHasSigned(int $hasSigned)
    {
        $this->hasSigned = $hasSigned;
    }


    /**
     * @param mixed $valuePaid
     */
    public function setValuePaid(int $valuePaid)
    {
        $this->valuePaid = $valuePaid;
    }

    public function getShortName() : string {
        return $this->toString();
    }

    /**
     * @return mixed
     */
    public function getHashMail() : string
    {
        return $this->hashMail;
    }

    /**
     * @param mixed $hashMail
     */
    public function setHashMail(string $hashMail)
    {
        $this->hashMail = $hashMail;
    }

    /**
     * @return mixed
     */
    public function getAdeliNumber() : string
    {
        return $this->adeliNumber;
    }

    /**
     * @return mixed
     */
    public function getPayment() : PaymentType
    {
        return $this->payment;
    }

    /**
     * @param mixed $payment
     */
    public function setPayment(PaymentType $payment)
    {
        $this->payment = $payment;
    }

    /**
     * @return mixed
     */
    public function getLongitude() : float
    {
        return $this->longitude;
    }

    /**
     * @param mixed $longitude
     */
    public function setLongitude(float $longitude)
    {
        $this->longitude = $longitude;
    }

    /**
     * @return mixed
     */
    public function getLatitude() : float
    {
        return $this->latitude;
    }

    /**
     * @param mixed $latitude
     */
    public function setLatitude(float $latitude)
    {
        $this->latitude = $latitude;
    }

    /**
     * @return mixed
     */
    public function getMailValidation() : string
    {
        return $this->mailValidation;
    }

    /**
     * @param mixed $mailValidation
     */
    public function setMailValidation(string $mailValidation)
    {
        $this->mailValidation = $mailValidation;
    }


    /**
     * @param mixed $adeliNumber
     */
    public function setAdeliNumber(string $adeliNumber)
    {
        $this->adeliNumber = $adeliNumber;
    }

    /**
     * @return mixed
     */
    public function getPassword() : string
    {
        return $this->password;
    }

    /**
     * @param mixed $password
     */
    public function setPassword(string $password)
    {
        $this->password = $password;
    }

    /**
     * @return mixed
     */
    public function getFirstName() : string
    {
        return $this->firstName != NULL ? strval(ucfirst(strtolower($this->firstName))) : "";
    }

    /**
     * @param mixed $firstName
     */
    public function setFirstName(string $firstName)
    {
        $this->firstName = ($firstName);
    }

    public function getName() : string {
        return $this->firstName.' '.$this->getLastName();
    }

    /**
     * @return mixed
     */
    public function getLastName() : string
    {
        return $this->lastName != NULL ? strtoupper($this->lastName) : "";
    }

    /**
     * @param mixed $lastName
     */
    public function setLastName(string $lastName)
    {
        $this->lastName = ($lastName);
    }

    /**
     * @return mixed
     */
    public function getMail() : string
    {
        return $this->mail != NULL ? strtolower($this->mail) : "";
    }

    /**
     * @param mixed $mail
     */
    public function setMail(string $mail)
    {
        $this->mail = $mail;
    }

    /**
     * @return mixed
     */
    public function getGroups() : array {
        return $this->groups;
    }

    /**
     * @param $group
     */
    public function setGroups(array $group) {
        $this->groups = $group;
    }

    public function isInGroup(string $group) : bool {
        foreach($this->groups as $gr) {
            if($gr->getName() == $group) {
                return true;
            }
        }

        if(substr($group, 0, 7) == 'NIVEAU_') {

            $level = substr($group, 7, 8);
            if(in_array($level, array("A", "B", "C", "D"))) {
                return $this->levelIsGreaterThan($level);
            }
        } else if ($group == 'CERTIFIE') {
            return $this->levelIsGreaterThan("CERTIFIÉ");
        }

        return false;
    }

    /**
     * @return mixed
     */
    public function getId() : int
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId(int $id)
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getAskValidation()
    {
        return $this->askReadhesion != NULL ? $this->askReadhesion : $this->askValidation;
    }

    /**
     * @param mixed $askValidation
     */
    public function setAskValidation(bool $askValidation)
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
    public function setValidDate(DateTime $validDate)
    {
        $this->validDate = $validDate;
    }

    /**
     * @return mixed
     */
    public function getAddress() : string
    {
        return $this->address != NULL ? $this->address : "";
    }

    /**
     * @param mixed $address
     */
    public function setAddress(string $address)
    {
        $this->address = ($address);
    }

    /**
     * @return mixed
     */
    public function getTown() : string
    {
        return $this->town != NULL ? strtoupper($this->town) : "";
    }

    /**
     * @param mixed $town
     */
    public function setTown(string $town)
    {
        $this->town = ($town);
    }

    /**
     * @return mixed
     */
    public function getCp() : int
    {
        return intval($this->cp);
    }

    /**
     * @param mixed $cp
     */
    public function setCp(int $cp)
    {
        $this->cp = $cp;
    }

    /**
     * @return mixed
     */
    public function getLevelFormation() : int
    {
        return intval($this->levelFormation);
    }

    public function getLevelFormationString() : string {
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
    public function setLevelFormation(int $levelFormation)
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
    public function setFormationDate(DateTime $formationDate)
    {
        $this->formationDate = $formationDate;
    }

    /**
     * @return mixed
     */
    public function getPhonePro() : string
    {
        return $this->phonePro != NULL ? $this->phonePro : "";
    }

    /**
     * @param mixed $phonePro
     */
    public function setPhonePro(string $phonePro)
    {
        $this->phonePro = $phonePro;
    }

    /**
     * @return mixed
     */
    public function getPhoneMobile() : string
    {
        return $this->phoneMobile != NULL ? $this->phoneMobile : "" ;
    }

    /**
     * @param mixed $phoneMobile
     */
    public function setPhoneMobile(string $phoneMobile)
    {
        $this->phoneMobile = $phoneMobile;
    }

    /**
     * @return mixed
     */
    public function getNewsletter() : bool
    {
        return boolval($this->newsletter);
    }

    /**
     * @param mixed $newsletter
     */
    public function setNewsletter(bool $newsletter)
    {
        $this->newsletter = $newsletter;
    }

    /**
     * @return mixed
     */
    public function getComplementAddress() : string
    {
        return $this->complementAddress != NULL ? $this->complementAddress : "";
    }

    /**
     * @param mixed $complementAddress
     */
    public function setComplementAddress(string $complementAddress)
    {
        $this->complementAddress = ($complementAddress);
    }

    /**
     * @return mixed
     */
    public function getDisable() : bool
    {
        return $this->disable;
    }

    /**
     * @param mixed $disable
     */
    public function setDisable(bool $disable)
    {
        $this->disable = $disable;
    }

    public function toString() : string {
        return $this->getFirstName()[0]. ". " .ucfirst(strtolower($this->getLastName()));
    }

    /**
     * @return mixed
     */
    public function getAskReadhesion()
    {
        return $this->askReadhesion;
    }

    /**
     * @param mixed $askReadhesion
     */
    public function setAskReadhesion(DateTime $askReadhesion)
    {
        $this->askReadhesion = $askReadhesion;
    }

    public function pushNotification(string $title, string $description, $idType, string $url) {
        $type = NotificationHelper::getNotificationType($idType);
        $notif = new Notification($title, $description, $type, $this, $url);
        Visitor::getEntityManager()->persist($notif);
        Visitor::getEntityManager()->flush();
    }

}
