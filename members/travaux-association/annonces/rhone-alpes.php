<?php
include('../../../begin.php');

use utils\Link;

$title = 'Annonces de remplacement — Rhône-Alpes';
$breadcrumb = new utils\Breadcrumb(array(new Link('home', 'index.php'), new Link('Espace membres', Visitor::getInstance()->getRootPage()."/members/index.php"),
    new Link('Annonces de remplacement','#'), new Link('Rhône-Alpes', '#')));
include(Visitor::getInstance()->getRootPath().'/views/includes/head.php');
include(Visitor::getInstance()->getRootPath().'/views/members/travaux-association/annonces/rhone-alpes.php');
include(Visitor::getInstance()->getRootPath().'/views/includes/foot.php');

?>
