<?php
include('begin.php');
require_once('libs/password_compat/lib/password.php');

use utils\Link;
$title = 'Connexion';

if(!isset($_POST['inputAdeli']) || !isset($_POST['inputPassword'])) {
    $breadcrumb = new utils\Breadcrumb(array(new Link('home', 'index.php'), new Link('Connexion', '#')));

    include(Visitor::getInstance()->getRootPath().'/views/includes/head.php');
    include(Visitor::getInstance()->getRootPath().'/views/connexion.php');
    include(Visitor::getInstance()->getRootPath().'/views/includes/foot.php');
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
