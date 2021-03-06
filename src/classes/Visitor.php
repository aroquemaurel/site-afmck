<?php
declare(strict_types = 1);
use database\DatabaseUser;
use Doctrine\ORM\EntityManager;
use models\User;
use utils\NotificationHelper;

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

    private static $entityManager;

    private function __construct() {
        $this->currentPath = '.';
    }

    public static function getInstance() : Visitor {
        if(Visitor::$instance == null) {
            if(isset($_SESSION['visitor']) && $_SESSION['visitor'] != null) {
                Visitor::$instance = $_SESSION['visitor'];
            } else {
                Visitor::$instance = new \Visitor();
                $_SESSION['visitor'] = Visitor::$instance;
            }

        }

        return Visitor::$instance;
    }

    public static function getNotifications()
    {
        $notifications = array();
        if(Visitor::getInstance()->isConnected()) {
            $notifications = NotificationHelper::getAllNotificationOfUser(Visitor::getInstance()->getUser());
        }

        return $notifications;
    }

    public function getUser() : User {
        return $this->user;
    }
    public function getUserByAdeliAndPassword(string $adeliNumber, string $password) : bool {
        $this->user = new User();
        if(User::passwordIsValid($adeliNumber, $password)) {
            $db = new DatabaseUser();
            $this->user->hydrat($db->getUser($adeliNumber));
            return true;
        } else {
            $this->user = null;
            return false;
        }
    }

    public function displayMenu() {
        if(strpos($this->getCurrentFile(), 'members') || strpos($this->getCurrentFile(), 'admin') || strpos($this->getCurrentFile(), 'CA')) {
            include($this->getRootPath() . '/views/includes/menus/members.php');
        } else {
            include($this->getRootPath() . '/views/includes/menus/visitors.php');
        }
    }

    public static function getRootPage() : string {
        return ROOT_PAGE;
    }

    public static function getRootPath() : string  {
        return ROOT_PATH.'/'.ROOT_PAGE;
    }

    public function getLastPage() {
        return $this->lastPage;
    }

    public function setLastPage(string $lastpage) {
        if($lastpage == $this->lastPage) {
            $this->lastPage = '../index.php';
        } else {
            $this->lastPage = $lastpage;
        }
    }
    public function isConnected() : bool {
        return $this->user != null;
    }
    public function getCurrentPath() : string {
        return $this->currentPath;
    }

    public function setCurrentPath(string $currentPath) {
        $this->currentPath = $currentPath;
    }
    public function autoconnect() {
        if(!$this->isConnected()) {
            $this->user = new User();
            if (!$this->user->autoConnect()) {
                $this->user = null;
            }
        }
    }
    public function connect(string $user, string $password, bool $remember=false) {
        $this->user = new User($user, $password);
        if($remember) {
            $this->user->setCookie();
        }
        if(!$this->user->connect()) {
            $this->user->clearCookie();
            unset($this->user);
        }
    }


    public function hasRights(string $pageFilename, array $groups=array()) : bool {

        if($groups != array() && $this->isConnected()) { // particular rights
            foreach($groups as $group) {
                if(substr($group, 0, 7) == "NIVEAU_" && $this->user->levelIsGreaterThan(substr($group, -1))) {
                    return true;
                }
                if($this->user->isInGroup($group)) {
                    return true;
                }
            }
            return false;
        } else if(strpos($pageFilename,'members/forums/')) { // not in database, but begin with members
            $authMembers = array("OTERO", "DE ROQUEMAUREL", "LOMER", "ROMEDENNE");
            return $this->isConnected();// && ($this->user->isInGroup("MEMBRE_CA") || $this->user->isInGroup("ADMINISTRATEUR"));
        } else if(strpos($pageFilename, 'members/')) {
            return $this->isConnected();
        } else if(strpos($pageFilename,'admin')) {
            return $this->isConnected() && $this->user->isInGroup("ADMINISTRATEUR");
        } else if(strpos($pageFilename, 'CA')) {
            return $this->isConnected() && $this->user->isInGroup("MEMBRE_CA");
        } else { // Every body can see
            return true;
        }
    }

    public function getCurrentDir() : string {
        $currentDir = '';
        if(basename(getcwd()) == 'members') {
            $currentDir = 'members/';
        } else if(basename(getcwd() == 'admin')) {
            $currentDir = 'admin';
        }

        return $currentDir;
    }

    public function getCurrentFile() : string {
        return $_SERVER['PHP_SELF'];
    }

    public function removeUser() {
        $this->user = null;
    }

    public static function setEntityManager(EntityManager $entityManager) {
        self::$entityManager = $entityManager;
    }

    public static function getEntityManager() : EntityManager {
        return self::$entityManager;
    }

    public static function getIpAddress() : string {
        $ipaddress = '';
        if (getenv('HTTP_CLIENT_IP'))
            $ipaddress = getenv('HTTP_CLIENT_IP');
        else if(getenv('HTTP_X_FORWARDED_FOR'))
            $ipaddress = getenv('HTTP_X_FORWARDED_FOR');
        else if(getenv('HTTP_X_FORWARDED'))
            $ipaddress = getenv('HTTP_X_FORWARDED');
        else if(getenv('HTTP_FORWARDED_FOR'))
            $ipaddress = getenv('HTTP_FORWARDED_FOR');
        else if(getenv('HTTP_FORWARDED'))
            $ipaddress = getenv('HTTP_FORWARDED');
        else if(getenv('REMOTE_ADDR'))
            $ipaddress = getenv('REMOTE_ADDR');
        else
            $ipaddress = 'UNKNOWN';
        return $ipaddress;
    }

} 
