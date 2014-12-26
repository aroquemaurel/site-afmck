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
        $query = $this->dbAccess->prepare("SELECT * from user WHERE adeliNumber = :number AND password=:password");
        $query->bindParam(":number", $adeliNumber, PDO::PARAM_INT);
        $query->bindParam(":password", $password, PDO::PARAM_STR);
        $query->execute();

        return $query->fetchObject();
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

        $query = $this->dbAccess->prepare("INSERT INTO user VALUES('', :adeliNumber, :firstname, :lastname, :password, :mail)");
        $query->bindParam(":adeliNumber", $adeli, PDO::PARAM_STR);
        $query->bindParam(":firstname", $firstname, PDO::PARAM_STR);
        $query->bindParam(":lastname", $lastname, PDO::PARAM_STR);
        $query->bindParam(":password", $password, PDO::PARAM_STR);
        $query->bindParam(":mail", $mail, PDO::PARAM_STR);
        $query->execute();

    }

    public function getUsersToValid() {
        $ret = array();

        $query = $this->dbAccess->prepare("SELECT * from `user`
                                           WHERE validDate < CURDATE() order by lastname");
        $query->execute();

        foreach($query->fetchAll(PDO::FETCH_OBJ) as $dataUser) {
            $user = new User();
            $user->hydrat($dataUser);
            $ret[] = $user;
        }
        return $ret;
    }
} 