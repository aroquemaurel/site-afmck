<?php
include('../begin.php');
use utils\Link;

if(Visitor::getInstance()->isConnected()) {
    $title = 'Évaluation et traitement d\'un genou';
    $breadcrumb = new utils\Breadcrumb(array(new Link('home', 'index.php'), new Link('Espace membres', '#'),
        new Link('Cas clinique','#'), new Link('Évaluation et traitement d\'un genou', '#')));
    include('../views/includes/head.php');
    include('../views/members/casclinique_genou.php');
    include('../views/includes/foot.php');
}
?>
