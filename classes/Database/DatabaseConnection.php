<?php
/**
 * Created by PhpStorm.
 * User: aroquemaurel
 * Date: 03/12/14
 * Time: 22:18
 */

require_once('Database.php');

class DatabaseConnection extends Database {
    public function connect(User& $user) {
        $adeliNumber = $user->getAdeliNumber();
        $password = $user->getPassword();
        $query = $this->dbAccess->prepare("SELECT adeliNumber from user WHERE adeliNumber = :number AND password=:password");
        $query->bindParam(":number", $adeliNumber, PDO::PARAM_INT);
        $query->bindParam(":password", $password, PDO::PARAM_STR);
        $query->execute();

        return $query->fetchObject() != null;
    }

    public function disconnect() {
        echo "TODO disconnection";
    }
} 