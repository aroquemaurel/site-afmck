<?php
//require_once("/home/afmck/www/crawlprotect/include/cppf.php");
require_once('../autoload.php');
session_start();

if(Visitor::getInstance()->isConnected()) {
    $title = 'Accueil membres';
    $breadcrumb = new utils\Breadcrumb(array(new Link('home', 'index.php'), new Link('Espace membres', '#'),
        new Link('Cas clinique','#'), new Link('Tendinite Rotulienne', '#')));
    include('../views/includes/head.php');
    include('../views/members/casclinique_rotulienne.php');
    include('../views/includes/foot.php');
}
?>
