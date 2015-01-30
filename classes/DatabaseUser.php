<?php
/**
 * Created by PhpStorm.
 * User: aroquemaurel
 * Date: 22/12/14
 * Time: 11:31
 */

require_once('Database.php');

class DatabaseUser extends Database {
    public function getUser($adeliNumber, $password="") {
        $query = $this->dbAccess->prepare("SELECT * from user WHERE adeliNumber = :number");
        $query->bindParam(":number", $adeliNumber, PDO::PARAM_INT);
        $query->execute();
        print_r($query->rowCount());
        return $query->fetchObject();
    }

    public function adeliExists($adeli) {
        $query = $this->dbAccess->prepare("SELECT count(*) as nb from user where adeliNumber = :number");
        $query->bindParam(":number", $adeli, PDO::PARAM_INT);
        $query->execute();
        return $query->fetchObject()->nb ;
    }
    public function getUserById($id) {
        $query = $this->dbAccess->prepare("SELECT * from user WHERE id=:id");
        $query->bindParam(":id", $id, PDO::PARAM_INT);
        $query->execute();
        $user = new User();
        $user->hydrat($query->fetchObject());
        return $user;
    }
    public function getGroups($id) {
        $query = $this->dbAccess->prepare("SELECT idGroup, nom from `user_group`, `group`
                                           WHERE idUser = :id and group.id=`user_group`.idGroup");
        $query->bindParam(":id", $id, PDO::PARAM_INT);
        $query->execute();

        return $query->fetchAll(PDO::FETCH_ASSOC);

    }

    public function addUser(User $user) {
        $adeli = utf8_decode($user->getAdeliNumber());
        $firstname = utf8_decode($user->getFirstName());
        $lastname = utf8_decode($user->getLastName());
        $password = utf8_decode($user->getPassword());
        $mail = utf8_decode($user->getMail());
        $address = utf8_decode($user->getAddress());
        $cp = utf8_decode($user->getCp());
        $town = utf8_decode($user->getTown());
        $complementAddress = utf8_decode($user->getComplementAddress());
        $formationDate = utf8_decode($user->getFormationDate()->format("Y-m-d"));
        $levelFormation = utf8_decode($user->getLevelFormation());
        $phonePro = utf8_decode($user->getPhonePro());
        $phoneMobile = utf8_decode($user->getPhoneMobile());
        $newsletter = utf8_decode($user->getNewsletter());
        $payment = utf8_decode($user->getPayment());
        $mailValidation = utf8_decode($user->getMailValidation());
        $hashMail = utf8_decode($user->getHashMail());
        $valuePaid = utf8_decode($user->getValuePaid());
        $query = $this->dbAccess->prepare("INSERT INTO user VALUES('', 0, :adeliNumber, :firstname, :lastname, :password,
                                                                :mail, CURDATE(), 0, :address, :complementAddress, :cp, :town, '',
                                                              :formationDate, :levelFormation, :phonePro,
                                                              :phoneMobile, :newsletter, :payment, :mailValidation, :hashMail, :valuePaid)");
        $query->bindParam(":adeliNumber", $adeli, PDO::PARAM_STR);
        $query->bindParam(":firstname", ($firstname), PDO::PARAM_STR);
        $query->bindParam(":lastname", ($lastname), PDO::PARAM_STR);
        $query->bindParam(":password", $password, PDO::PARAM_STR);
        $query->bindParam(":mail", $mail, PDO::PARAM_STR);

        $query->bindParam(":address", ($address), PDO::PARAM_STR);
        $query->bindParam(":complementAddress", ($complementAddress), PDO::PARAM_STR);
        $query->bindParam(":cp", $cp, PDO::PARAM_STR);
        $query->bindParam(":town", ($town), PDO::PARAM_STR);

        $query->bindParam(":formationDate", $formationDate, PDO::PARAM_STR);
        $query->bindParam(":levelFormation", $levelFormation, PDO::PARAM_INT);
        $query->bindParam(":phonePro", $phonePro, PDO::PARAM_STR);
        $query->bindParam(":phoneMobile", $phoneMobile, PDO::PARAM_STR);
        $query->bindParam(":newsletter", $newsletter, PDO::PARAM_INT);
        $query->bindParam(":payment", $payment, PDO::PARAM_INT);
        $query->bindParam(":mailValidation", $mailValidation, PDO::PARAM_INT);
        $query->bindParam(":hashMail", $hashMail, PDO::PARAM_STR);
        $query->bindParam(":valuePaid", $valuePaid, PDO::PARAM_INT);

        $query->execute();

    }

    public function getUsersValides () {
        $ret = array();

        $query = $this->dbAccess->prepare("SELECT * from `user` WHERE validDate >= CURDATE()
                                           order by lastname");
        $query->execute();

        foreach($query->fetchAll(PDO::FETCH_OBJ) as $dataUser) {
            $user = new User();
            $user->hydrat($dataUser);
            $ret[] = $user;
        }
        return $ret;
    }
    public function getUsersHS() {
        $ret = array();

        $query = $this->dbAccess->prepare("SELECT * from `user` WHERE validDate < CURDATE() AND mailValidation != 0
                                           order by lastname");
        $query->execute();

        foreach($query->fetchAll(PDO::FETCH_OBJ) as $dataUser) {
            $user = new User();
            $user->hydrat($dataUser);
            $ret[] = $user;
        }
        return $ret;
    }



    public function getUsersToValid() {
        $ret = array();

        $query = $this->dbAccess->prepare("SELECT * from `user`
                                           WHERE validDate < CURDATE()  AND mailValidation != 0 AND validDate != 'NULL' AND disable != 1 order by lastname");
        $query->execute();

        foreach($query->fetchAll(PDO::FETCH_OBJ) as $dataUser) {
            $user = new User();
            $user->hydrat($dataUser);
            $ret[] = $user;
        }
        return $ret;
    }
    public function getUsersDisableSoon() {
        $ret = array();

        $query = $this->dbAccess->prepare("SELECT * from `user`
                                           WHERE (validDate between CURDATE() AND DATE_ADD(CURDATE(), INTERVAL 3 MONTH) AND mailValidation != 0 )
                                           order by lastname");
        $query->execute();

        foreach($query->fetchAll(PDO::FETCH_OBJ) as $dataUser) {
            $user = new User();
            $user->hydrat($dataUser);
            $ret[] = $user;
        }
        return $ret;
    }

    public function countUsersToValid() {
        $query = $this->dbAccess->prepare("SELECT count(id) as countid from `user`
                                           WHERE validDate < CURDATE()  AND mailValidation != 0 AND validDate != 'NULL' AND disable=0");
        $query->execute();
        return $query->fetchObject()->countid;

    }
    public function editUser(User $user)
    {
        $id = $user->getId();
        $askValidation = $user->getAskValidation() != NULL ? $user->getAskValidation()->format("Y-m-d") : "NULL";
        $validDate = $user->getValidDate() != NULL ? $user->getValidDate()->format("Y-m-d") : "NULL";
        $adeli = utf8_decode($user->getAdeliNumber());
        $firstname = utf8_decode($user->getFirstName());
        $lastname = utf8_decode($user->getLastName());
        $password = utf8_decode($user->getPassword());
        $mail = utf8_decode($user->getMail());
        $address = utf8_decode($user->getAddress());
        $cp = utf8_decode($user->getCp());
        $town = utf8_decode($user->getTown());
        $complementAddress = utf8_decode($user->getComplementAddress());
        $formationDate = utf8_decode($user->getFormationDate()->format("Y-m-d"));
        $levelFormation = utf8_decode($user->getLevelFormation());
        $phonePro = utf8_decode($user->getPhonePro());
        $phoneMobile = utf8_decode($user->getPhoneMobile());
        $newsletter = utf8_decode($user->getNewsletter());
        $disable = utf8_decode($user->getDisable());
        $payment = utf8_decode($user->getPayment());
        $mailValidation = utf8_decode($user->getMailValidation());
        $hashMail = utf8_decode($user->getHashMail());
        $valuePaid = utf8_decode($user->getValuePaid());

        $query = $this->dbAccess->prepare("UPDATE `user`
                                          set adeliNumber=:adeli, lastname=:lastname, firstname=:firstname,
                                          mail=:mail,validDate=:validDate,askValidation=:askValidation, password=:password, forget=:forget,
                                          formationDate=:formationDate, levelFormation=:levelFormation, phonePro=:phonePro, phoneMobile=:phoneMobile,
                                          newsletter=:newsletter, address=:address, cp=:cp, town=:town, complementAddress=:complementAddress,
                                          disable=:disable, payment=:payment, mailValidation=:mailValidation, hashMail=:hashMail, valuePaid=:valuePaid
                                           WHERE id=:id");
        $query->bindParam(":adeli", $adeli, PDO::PARAM_STR);
        $query->bindParam(":disable", $disable, PDO::PARAM_INT);
        $query->bindParam(":address", $address, PDO::PARAM_STR);
        $query->bindParam(":complementAddress", $complementAddress, PDO::PARAM_STR);
        $query->bindParam(":cp", $cp, PDO::PARAM_STR);
        $query->bindParam(":town", $town, PDO::PARAM_STR);
        $query->bindParam(":lastname", $lastname, PDO::PARAM_STR);
        $query->bindParam(":firstname", $firstname, PDO::PARAM_STR);
        $query->bindParam(":mail", $mail, PDO::PARAM_STR);
        $query->bindParam(":validDate", $validDate, PDO::PARAM_STR);
        $query->bindParam(":askValidation", $askValidation, PDO::PARAM_STR);
        $query->bindParam(":id", $id, PDO::PARAM_INT);
        $query->bindParam(":password", $password, PDO::PARAM_STR);
        $query->bindParam(":forget", $forget, PDO::PARAM_STR);
        $query->bindParam(":levelFormation", $levelFormation, PDO::PARAM_INT);
        $query->bindParam(":formationDate", $formationDate, PDO::PARAM_STR);
        $query->bindParam(":phoneMobile", $phoneMobile, PDO::PARAM_STR);
        $query->bindParam(":phonePro", $phonePro, PDO::PARAM_STR);
        $query->bindParam(":newsletter", $newsletter, PDO::PARAM_INT);
        $query->bindParam(":payment", $payment, PDO::PARAM_INT);
        $query->bindParam(":valuePaid", $valuePaid, PDO::PARAM_INT);
        $query->bindParam(":mailValidation", $mailValidation, PDO::PARAM_INT);
        $query->bindParam(":hashMail", $hashMail, PDO::PARAM_STR);
        $query->execute();

    }

    public function getUsersDisable()
    {
        $ret = array();

        $query = $this->dbAccess->prepare("SELECT * from `user`
                                           WHERE disable=1
                                           order by lastname");
        $query->execute();

        foreach($query->fetchAll(PDO::FETCH_OBJ) as $dataUser) {
            $user = new User();
            $user->hydrat($dataUser);
            $ret[] = $user;
        }
        return $ret;

    }
}
