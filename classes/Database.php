<?php
/**
 * Created by PhpStorm.
 * User: aroquemaurel
 * Date: 03/12/14
 * Time: 22:08
 */

if(file_exists("db/logins.php")) {
    require_once("db/logins.php");
} else {
    require_once("../db/logins.php");
}
class Database {
    private $host;
    private $dbName;
    private $user;
    private $password;

    protected $dbAccess;
    protected $error;

    public function __construct () {
        $this->host = HOST;
        $this->dbName = DBNAME;
        $this->user = USER;
        $this->password = PASSWORD;

        $dsn = 'mysql:host=' . $this->host . ';dbname=' . $this->dbName;
        // Set options
        $options = array(
            PDO::ATTR_PERSISTENT => true,
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
        );

        try {
            $this->dbAccess = new PDO($dsn, $this->user, $this->password, $options);
        }// Catch any errors
        catch (PDOException $e) {
            $this->error = $e->getMessage();
        }
    }

    public function __destruct() {
        unset($this->dbAccess);
    }

} 