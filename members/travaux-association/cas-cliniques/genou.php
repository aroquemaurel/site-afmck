<?php
include('../../../begin.php');
use utils\Link;

$title = 'Évaluation et traitement d\'un genou';
$breadcrumb = new utils\Breadcrumb(array(new Link('home', 'index.php'), new Link('Espace membres', Visitor::getRootPage()."/members/index.php"),
    new Link('Cas clinique','#'), new Link('Évaluation et traitement d\'un genou', '#')));
include(Visitor::getRootPath().'/views/includes/head.php');
include(Visitor::getRootPath().'/views/members/travaux-association/cas-cliniques/genou.php');
include(Visitor::getRootPath().'/views/includes/foot.php');
?>
