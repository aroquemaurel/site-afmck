<?php
/**
 * Created by PhpStorm.
 * User: aroquemaurel
 * Date: 29/11/14
 * Time: 23:16
 */

class Visitor {
    private $user;
    private static $instance;
    private $lastPage;
    private $currentPath;

    private function __construct() {
        $this->currentPath = '.';
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

    public function getUser() {
        return $this->user;
    }

    public function displayMenu() {
        if(!$this->isConnected() || basename(getcwd()) != 'members') {
            include('views/includes/menus/visitors.php');
        } else {
            include('../views/includes/menus/members.php');
        }
    }

    public function getRootPage() {
        if(basename(getcwd()) == 'members') {
            return '..';
        } else {
            return '.';
        }
    }
    public function getLastPage() {
        return "index.php";
        return $this->lastPage;
    }
    public function isConnected() {
        return $this->user != null;
    }
    public function getCurrentPath() {
        return $this->currentPath;
    }

    public function setCurrentPath($currentPath) {
        $this->currentPath = $currentPath;
    }
    public function connect($user, $password) {
        $this->user = new User($user, $password);
        if(!$this->user->connect()) {
            unset($this->user);
        }

        $_SESSION['lastMessage'] = $this->isConnected() ? Popup::connectionOk() : Popup::connectionKo();
    }

} 
