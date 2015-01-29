<?php
/**
 * Created by PhpStorm.
 * User: aroquemaurel
 * Date: 22/12/14
 * Time: 11:31
 */

require_once('Database.php');

class DatabaseUser extends Database {
    public function getUser($adeliNumber, $password) {
        $query = $this->dbAccess->prepare("SELECT * from user WHERE adeliNumber = :number");
        $query->bindParam(":number", $adeliNumber, PDO::PARAM_INT);
        $query->execute();

        return $query->fetchObject();
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
        $adeli = $user->getAdeliNumber();
        $firstname = $user->getFirstName();
        $lastname = $user->getLastName();
        $password = $user->getPassword();
        $mail = $user->getMail();
        $address = $user->getAddress();
        $cp = $user->getCp();
        $town = $user->getTown();
        $complementAddress = $user->getComplementAddress();
        $formationDate = $user->getFormationDate()->format("Y-m-d");
        $levelFormation = $user->getLevelFormation();
        $phonePro = $user->getPhonePro();
        $phoneMobile = $user->getPhoneMobile();
        $newsletter = $user->getNewsletter();
        $disable = $user->getDisable();
        $payment = $user->getPayment();

        $query = $this->dbAccess->prepare("INSERT INTO user VALUES('', :disable, :adeliNumber, :firstname, :lastname, :password,
                                                                :mail, CURDATE(), 0, :address, :complementAddress, :cp, :town, '',
                                                              :formationDate, :levelFormation, :phonePro,
                                                              :phoneMobile, :newsletter, :payment)");
        $query->bindParam(":adeliNumber", $adeli, PDO::PARAM_STR);
        $query->bindParam(":firstname", $firstname, PDO::PARAM_STR);
        $query->bindParam(":lastname", $lastname, PDO::PARAM_STR);
        $query->bindParam(":password", $password, PDO::PARAM_STR);
        $query->bindParam(":mail", $mail, PDO::PARAM_STR);

        $query->bindParam(":address", $address, PDO::PARAM_STR);
        $query->bindParam(":complementAddress", $complementAddress, PDO::PARAM_STR);
        $query->bindParam(":cp", $cp, PDO::PARAM_STR);
        $query->bindParam(":town", $town, PDO::PARAM_STR);

        $query->bindParam(":formationDate", $formationDate, PDO::PARAM_STR);
        $query->bindParam(":levelFormation", $levelFormation, PDO::PARAM_INT);
        $query->bindParam(":phonePro", $phonePro, PDO::PARAM_STR);
        $query->bindParam(":phoneMobile", $phoneMobile, PDO::PARAM_STR);
        $query->bindParam(":newsletter", $newsletter, PDO::PARAM_INT);
        $query->bindParam(":disable", $disable, PDO::PARAM_INT);
        $query->bindParam(":payment", $payment, PDO::PARAM_INT);
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

        $query = $this->dbAccess->prepare("SELECT * from `user` WHERE validDate < CURDATE()
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
                                           WHERE validDate < CURDATE() AND validDate != 'NULL' AND disable != 1 order by lastname");
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
                                           WHERE (validDate between CURDATE() AND DATE_ADD(CURDATE(), INTERVAL 3 MONTH))
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
                                           WHERE validDate < CURDATE() AND validDate != 'NULL' AND disable=0");
        $query->execute();
        return $query->fetchObject()->countid;

    }
    public function editUser(User $user)
    {
        $id = $user->getId();
        $askValidation = $user->getAskValidation() != NULL ? $user->getAskValidation()->format("Y-m-d") : "NULL";
        $lastname = $user->getLastName();
        $firstname = $user->getFirstName();
        $validDate = $user->getValidDate() != NULL ? $user->getValidDate()->format("Y-m-d") : "NULL";
        $adeli = $user->getAdeliNumber();

        $address = $user->getAddress();
        $complementAddress = $user->getComplementAddress();
        $cp = $user->getCp();
        $town = ($user->getTown());

        $mail = $user->getMail();
        $password = $user->getPassword();
        $forget = $user->getHash();
        $levelFormation = $user->getLevelFormation();
        $formationDate = $user->getFormationDate()->format("Y-m-d");
        $phonePro = $user->getPhonePro();
        $phoneMobile = $user->getPhonePro();
        $newsletter = $user->getNewsletter();
        $disable = $user->getDisable();

        $query = $this->dbAccess->prepare("UPDATE `user`
                                          set adeliNumber=:adeli, lastname=:lastname, firstname=:firstname,
                                          mail=:mail,validDate=:validDate,askValidation=:askValidation, password=:password, forget=:forget,
                                          formationDate=:formationDate, levelFormation=:levelFormation, phonePro=:phonePro, phoneMobile=:phoneMobile,
                                          newsletter=:newsletter, address=:address, cp=:cp, town=:town, complementAddress=:complementAddress,
                                          disable=:disable
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