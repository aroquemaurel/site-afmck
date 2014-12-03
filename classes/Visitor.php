<?php
/**
 * Created by PhpStorm.
 * User: aroquemaurel
 * Date: 29/11/14
 * Time: 23:16
 */
require_once('db/DatabaseConnection.php');
require_once('User.php');
require_once('views/Popup.php');
class Visitor {
    private $user;
    private static $instance;
    private $lastPage;

    private function __construct() {
    }

    public static function getInstance() {
        if(Visitor::$instance == null) {
            if(isset($_SESSION['visitor']) && $_SESSION['visitor'] != null) {
                Visitor::$instance = $_SESSION['visitor'];
            } else {
                Visitor::$instance = new Visitor();
                $_SESSION['visitor'] = Visitor::$instance;
            }
        }

        return Visitor::$instance;
    }

    public function displayMenu() {
        if(!$this->isConnected()) {
            include('views/includes/menus/visitors.php');
        } else {
            include('views/includes/menus/members.php');
        }
    }
    public function getLastPage() {
        return "index.php";
        return $this->lastPage;
    }
    public function isConnected() {
        return $this->user != null;
    }

    public function connect($user, $password) {
        $this->user = new User($user, $password);
        if(!$this->user->connect()) {
            unset($this->user);
        }
        $_SESSION['lastMessage'] = $this->isConnected() ? Popup::connectionOk() : Popup::connectionKo();
    }

} 
