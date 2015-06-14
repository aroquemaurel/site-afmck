<?php
/**
 * Created by PhpStorm.
 * User: aroquemaurel
 * Date: 14/06/15
 * Time: 21:17
 */
require_once('Database.php');

class DatabaseLicense extends Database {
    public function getLicense(User $user) {
        $idUser = $user->getId();
        $query = $this->dbAccess->prepare("SELECT * from user_software WHERE idUser = :idUser order by dateAsking DESC LIMIT 1");
        $query->bindParam(":idUser", $idUser, PDO::PARAM_INT);
        $query->execute();

        return $query->fetchObject();
    }

    public function addLicense(License $license) {
        $idUser = $license->getUser()->getId();
        $date = $license->getDate()->format("Y-m-d");
        $key = $license->getKey();

        $query = $this->dbAccess->prepare("INSERT INTO user_software VALUES(:idUser, :dateAsking, :key)");
        $query->bindParam(":idUser", $idUser, PDO::PARAM_STR);
        $query->bindParam(":dateAsking", $date, PDO::PARAM_STR);
        $query->bindParam(":key", $key, PDO::PARAM_STR);

        $query->execute();

    }
}