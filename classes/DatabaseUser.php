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

        $query = $this->dbAccess->prepare("INSERT INTO user VALUES('', :adeliNumber, :firstname, :lastname, :password, :mail, CURDATE(), 0, :address, :cp, :town, '')");
        $query->bindParam(":adeliNumber", $adeli, PDO::PARAM_STR);
        $query->bindParam(":firstname", $firstname, PDO::PARAM_STR);
        $query->bindParam(":lastname", $lastname, PDO::PARAM_STR);
        $query->bindParam(":password", $password, PDO::PARAM_STR);
        $query->bindParam(":mail", $mail, PDO::PARAM_STR);

        $query->bindParam(":address", $address, PDO::PARAM_STR);
        $query->bindParam(":cp", $cp, PDO::PARAM_STR);
        $query->bindParam(":town", $town, PDO::PARAM_STR);

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
                                           WHERE validDate < CURDATE() AND validDate != 'NULL' order by lastname");
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
        $ret = array();

        $query = $this->dbAccess->prepare("SELECT count(id) as countid from `user`
                                           WHERE validDate < CURDATE() AND validDate != 'NULL'");
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
        $mail = $user->getMail();
        $password = $user->getPassword();
        $forget = $user->getHash();
        $query = $this->dbAccess->prepare("UPDATE `user`
                                          set adeliNumber=:adeli, lastname=:lastname, firstname=:firstname,
                                          mail=:mail,validDate=:validDate,askValidation=:askValidation, password=:password, forget=:forget
                                           WHERE id=:id");
        $query->bindParam(":adeli", $adeli, PDO::PARAM_STR);
        $query->bindParam(":lastname", $lastname, PDO::PARAM_STR);
        $query->bindParam(":firstname", $firstname, PDO::PARAM_STR);
        $query->bindParam(":mail", $mail, PDO::PARAM_STR);
        $query->bindParam(":validDate", $validDate, PDO::PARAM_STR);
        $query->bindParam(":askValidation", $askValidation, PDO::PARAM_STR);
        $query->bindParam(":id", $id, PDO::PARAM_INT);
        $query->bindParam(":password", $password, PDO::PARAM_STR);
        $query->bindParam(":forget", $forget, PDO::PARAM_STR);
        $query->execute();

    }
} 