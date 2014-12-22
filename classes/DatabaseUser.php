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
        $query = $this->dbAccess->prepare("SELECT adeliNumber from user WHERE adeliNumber = :number AND password=:password");
        $query->bindParam(":number", $adeliNumber, PDO::PARAM_INT);
        $query->bindParam(":password", $password, PDO::PARAM_STR);
        $query->execute();

        $data =  $query->fetchObject();
        if($data == null) {
            return false;
        }
    }
} 