<?php
include('begin.php');
use utils\Link;

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
