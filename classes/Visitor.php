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
        include($this->getRootPage().'/views/includes/menus/visitors.php');
    }

    public function getRootPage() {
        if(basename(getcwd()) == 'members' || basename(getcwd()) == 'admin') {
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
    }


    public function hasRights($pageFilename, $groups=array()) {
        $splits = explode('/', $pageFilename);
        if($groups != array() && $this->isConnected()) { // particular rights
            foreach($groups as $group) {
                if($this->user->isInGroup($group)) {
                    return true;
                }
            }
            return false;
        } else if($splits['0'] == 'members') { // not in database, but begin with members
            return $this->isConnected();
        } else if($splits['0'] == 'admin') {
            return $this->isConnected() && $this->user->isInGroup("ADMINISTRATEUR");
        } else { // Every body can see
            return true;
        }
    }

    public function getCurrentDir() {
        $currentDir = '';
        if(basename(getcwd()) == 'members') {
            $currentDir = 'members/';
        } else if(basename(getcwd() == 'admin')) {
            $currentDir = 'admin';
        }

        return $currentDir;
    }

    public function getCurrentFile() {
        $currentFile = '';
        if(basename(getcwd()) == 'members') {
            $currentFile .= 'members/';
        } else if(basename(getcwd()) == 'admin') {
            $currentFile .= 'admin/';
        }
        $currentFile .= basename($_SERVER['PHP_SELF']);

        return $currentFile;
    }

} 
