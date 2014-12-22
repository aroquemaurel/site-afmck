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
        $query = $this->dbAccess->prepare("SELECT idGroup, nom from `user_group`, `group` WHERE idUser = :id AND id = idUser");
        echo $id;
        $query->bindParam(":id", $id, PDO::PARAM_INT);
        $query->execute();

        return $query->fetchAll(PDO::FETCH_ASSOC);

    }
} 