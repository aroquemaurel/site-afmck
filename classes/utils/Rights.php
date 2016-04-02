<?php
/**
 * Created by PhpStorm.
 * User: aroquemaurel
 * Date: 22/12/14
 * Time: 17:07
 */

namespace utils;

use Visitor;
use Popup;
class Rights {
    private static function getCurrentDir() {

    }
    public static function hasRights($groups = array()) {

        if(!Visitor::getInstance()->hasRights(Visitor::getInstance()->getCurrentFile(), $groups)) {
            $_SESSION['lastMessage'] = Popup::forbidden();
            header('Location: ' . (Visitor::getInstance()->getRootPage(). '/index.php'));
            exit();
        }
    }
}
