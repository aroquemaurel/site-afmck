<?php
//require_once("/home/afmck/www/crawlprotect/include/cppf.php");
require_once('classes/Visitor.php');
require_once('classes/Breadcrumb.php');
require_once('classes/Link.php');
require_once('views/Popup.php');
session_start();

$title = 'Connexion';

if(!Visitor::getInstance()->isConnected()) {
    Visitor::getInstance()->connect("1234", "456");
} else {
    $_SESSION['lastMessage'] = Popup::alreadyConnection();
}
header('Location: ' . Visitor::getInstance()->getLastPage());
?>
