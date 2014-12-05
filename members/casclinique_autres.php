<?php
//require_once("/home/afmck/www/crawlprotect/include/cppf.php");
require_once('../autoload.php');
session_start();

if(Visitor::getInstance()->isConnected()) {
    $title = 'Autres cas cliniques';
    $breadcrumb = new Breadcrumb(array(new Link('home', 'index.php'), new Link('Espace membres', '#'),
        new Link('Cas clinique','#'), new Link('Autres cas cliniques', '#')));
    include('../views/includes/head.php');
    include('../views/members/casclinique_autres.php');
    include('../views/includes/foot.php');
}
?>
