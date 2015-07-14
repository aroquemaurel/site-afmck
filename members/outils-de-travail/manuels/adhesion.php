<?php
include('../../../begin.php');
use utils\Link;

$title = 'Manuel — Adhésion';
$breadcrumb = new utils\Breadcrumb(array(new Link('home', 'index.php'), new Link('Espace membres', Visitor::getInstance()->getRootPage()."/members/index.php"),
    new Link('Outils de travail','#'), new Link('Manuels', '#'), new Link('Adhésion', '#')));
include(Visitor::getInstance()->getRootPath().'/views/includes/head.php');
include(Visitor::getInstance()->getRootPath().'/views/members/outils-de-travail/manuels/adhesion.php');
include(Visitor::getInstance()->getRootPath().'/views/includes/foot.php');
?>

