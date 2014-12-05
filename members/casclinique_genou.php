<?php
//require_once("/home/afmck/www/crawlprotect/include/cppf.php");
require_once('../autoload.php');
session_start();

if(Visitor::getInstance()->isConnected()) {
    $title = 'Évaluation et traitement d\'un genou';
    $breadcrumb = new Breadcrumb(array(new Link('home', 'index.php'), new Link('Espace membres', '#'),
        new Link('Cas clinique','#'), new Link('Évaluation et traitement d\'un genou', '#')));
    include('../views/includes/head.php');
    include('../views/members/casclinique_genou.php');
    include('../views/includes/foot.php');
}
?>
