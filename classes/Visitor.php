<?php
/**
 * Created by PhpStorm.
 * User: aroquemaurel
 * Date: 29/11/14
 * Time: 23:16
 */

class Visitor {
    private $member;
    private static $instance;

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
        if($this->member == null) {
            include('views/includes/menus/visitors.php');
        } else {
            include('views/includes/menus/members.php');
        }
    }

} 
