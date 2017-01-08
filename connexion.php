<?php
$title = 'Connexion';

include('begin.php');

use utils\Link;

if(!isset($_POST['inputAdeli']) || !isset($_POST['inputPassword'])) {
    $breadcrumb = new utils\Breadcrumb(array(new Link('home', 'index.php'), new Link('Connexion', '#')));

    include(Visitor::getRootPath().'/views/includes/head.php');
    include(Visitor::getRootPath().'/views/connexion.php');
    include(Visitor::getRootPath().'/views/includes/foot.php');
    exit();
}
$adeliNumber = $_POST['inputAdeli'];
$password = $_POST['inputPassword'];

if(!Visitor::getInstance()->isConnected()) {
    Visitor::getInstance()->connect($adeliNumber, $password, isset($_POST['remember']) ? $_POST['remember'] : false);
    $_SESSION['isReloaded'] = true;
} else {
    $_SESSION['lastMessage'] = Popup::alreadyConnection();
}

if(Visitor::getInstance()->isConnected()) {
    header('Location: ' . 'members/index.php');
} else {
    header('Location: ' . 'index.php');
}

?>
