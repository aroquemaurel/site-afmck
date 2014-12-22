<?php
//require_once("/home/afmck/www/crawlprotect/include/cppf.php");
require_once('../autoload.php');
session_start();

if(Visitor::getInstance()->isConnected()) {
    $title = 'Évaluation et traitement d\'une épaule';
    $breadcrumb = new utils\Breadcrumb(array(new Link('home', 'index.php'), new Link('Espace membres', '#'),
        new Link('Cas clinique','#'), new Link('Cas clinique et traitement d\'un genou', '#')));
    include('../views/includes/head.php');
    include('../views/members/casclinique_epaule.php');
    include('../views/includes/foot.php');
}
?>
