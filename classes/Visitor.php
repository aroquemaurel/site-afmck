<?php
/**
 * Created by PhpStorm.
 * User: aroquemaurel
 * Date: 29/11/14
 * Time: 23:16
 */
require_once('db/DatabaseConnection.php');
require_once('User.php');
class Visitor {
    private $user;
    private static $instance;
    private $lastPage;

    private function __construct() {
        $_SESSION['currentConnexion'] = false;
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
        if($this->isConnected()) {
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

    public function displayConnectionPopup() {
        if(isset($_SESSION['currentConnexion']) && $_SESSION['currentConnexion']) {
            if($this->isConnected()) {
                echo '<div class="alert alert-success alert-dismissible" role="alert">
        <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        <strong>Succès</strong> Vous êtes maintenant connectés
        </div>';
            } else {
                echo '<div class="alert alert-danger alert-dismissible" role="alert">
        <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        <strong>Erreur</strong> Le numéro ADELI ou le mot de passe est incorrect
        </div>';
                }
        }

        $_SESSION['currentConnexion'] = false;
    }

    public function connect($user, $password) {
        $db = new DatabaseConnection();
        $this->user = new User($user, $password);
        if(!$this->user->connect()) {
            $this->user = null;
        }
        $_SESSION['currentConnexion'] = true;
    }

} 
