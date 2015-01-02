<?php
include('begin.php');
require_once('libs/password_compat/lib/password.php');

use utils\Link;
$title = 'Connexion';

if(!isset($_POST['inputAdeli']) || !isset($_POST['inputPassword'])) {
    $breadcrumb = new utils\Breadcrumb(array(new Link('home', 'index.php'), new Link('Connexion', '#')));

    include('views/includes/head.php');
    include('views/connexion.php');
    include('views/includes/foot.php');
    exit();
}
$adeliNumber = $_POST['inputAdeli'];
$password = $_POST['inputPassword'];

if(!Visitor::getInstance()->isConnected()) {
        Visitor::getInstance()->connect($adeliNumber, $password, $_POST['remember']);
} else {
    $_SESSION['lastMessage'] = Popup::alreadyConnection();
}

if(Visitor::getInstance()->isConnected()) {
    header('Location: ' . 'members/index.php');
} else {
    header('Location: ' . 'index.php');
}
?>
