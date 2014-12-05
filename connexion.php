<?php
//require_once("/home/afmck/www/crawlprotect/include/cppf.php");
require_once('autoload.php');
session_start();

$title = 'Connexion';
$adeliNumber = $_POST['inputAdeli'];
$password = $_POST['inputPassword'];

if(!Visitor::getInstance()->isConnected()) {
    Visitor::getInstance()->connect($adeliNumber, $password);
} else {
    $_SESSION['lastMessage'] = Popup::alreadyConnection();
}
header('Location: ' . Visitor::getInstance()->getLastPage());
?>
