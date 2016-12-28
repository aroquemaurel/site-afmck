<?php
include('../../../begin.php');
use utils\Link;

$title = 'Manuel — Adhésion';
$breadcrumb = new utils\Breadcrumb(array(new Link('home', 'index.php'), new Link('Espace membres', Visitor::getRootPage()."/members/index.php"),
    new Link('Outils de travail','#'), new Link('Manuels', '#'), new Link('Adhésion', '#')));
include(Visitor::getRootPath().'/views/includes/head.php');
include(Visitor::getRootPath().'/views/members/outils-de-travail/manuels/adhesion.php');
include(Visitor::getRootPath().'/views/includes/foot.php');
?>

