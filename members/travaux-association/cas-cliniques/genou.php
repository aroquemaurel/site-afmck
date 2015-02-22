<?php
include('../../../begin.php');
use utils\Link;

$title = 'Évaluation et traitement d\'un genou';
$breadcrumb = new utils\Breadcrumb(array(new Link('home', 'index.php'), new Link('Espace membres', Visitor::getInstance()->getRootPage()."/members/index.php"),
    new Link('Cas clinique','#'), new Link('Évaluation et traitement d\'un genou', '#')));
include(Visitor::getInstance()->getRootPath().'/views/includes/head.php');
include(Visitor::getInstance()->getRootPath().'/views/members/travaux-association/cas-cliniques/genou.php');
include(Visitor::getInstance()->getRootPath().'/views/includes/foot.php');
?>
