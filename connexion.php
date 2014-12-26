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

if(Visitor::getInstance()->isConnected()) {
    header('Location: ' . 'members/index.php');
} else {
    header('Location: ' . 'index.php');
}
?>
