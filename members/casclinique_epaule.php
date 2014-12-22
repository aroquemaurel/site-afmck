<?php
include('../begin.php');
use utils\Link;

if(Visitor::getInstance()->isConnected()) {
    $title = 'Évaluation et traitement d\'une épaule';
    $breadcrumb = new utils\Breadcrumb(array(new Link('home', 'index.php'), new Link('Espace membres', '#'),
        new Link('Cas clinique','#'), new Link('Cas clinique et traitement d\'un genou', '#')));
    include('../views/includes/head.php');
    include('../views/members/casclinique_epaule.php');
    include('../views/includes/foot.php');
}
?>
