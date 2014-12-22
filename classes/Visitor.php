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
        return $this->lastPage;
    }

    public function setLastPage($lastpage) {
        if($lastpage == $this->lastPage) {
            $this->lastPage = '../index.php';
        } else {
            $this->lastPage = $lastpage;
        }
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


    public function hasRights($pageFilename) {
        $splits = explode('/', $pageFilename);
        if(false) { // pagefilename is in database
            // TODO… Later.
        } else if($splits['0'] == 'members') { // not in database, but begin with members
            return $this->isConnected();
        } else { // Every body can see
            return true;
        }
    }

} 
