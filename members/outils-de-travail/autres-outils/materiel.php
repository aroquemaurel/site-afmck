<?php
include('../../../begin.php');
use utils\Link;

$title = 'Le matériel';
$breadcrumb = new utils\Breadcrumb(array(new Link('home', 'index.php'), new Link('Espace membres', Visitor::getInstance()->getRootPage()."/members/index.php"),
    new Link('Outils de travail','#'), new Link('Le matériel', '#')));
include(Visitor::getInstance()->getRootPath().'/views/includes/head.php');
include(Visitor::getInstance()->getRootPath().'/views/members/outils-de-travail/autres-outils/materiel.php');
include(Visitor::getInstance()->getRootPath().'/views/includes/foot.php');
?>
