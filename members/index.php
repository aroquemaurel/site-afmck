<?php
//require_once("/home/afmck/www/crawlprotect/include/cppf.php");
require_once('../autoload.php');
session_start();
Visitor::getInstance()->setCurrentPath('members');
if(Visitor::getInstance()->isConnected()) {
    $title = 'Accueil membres';
    $breadcrumb = new Breadcrumb(array(new Link('home', 'index.php'), new Link('Espace membres', '#'),
        new Link('Accueil membres','members/index.php')));
    include('../views/includes/head.php');
    include('../views/members/index.php');
    include('../views/includes/foot.php');
}
?>
