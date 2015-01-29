<?php
include('../../../begin.php');
use utils\Link;

$title = 'Fiches bilan';
$breadcrumb = new utils\Breadcrumb(array(new Link('home', 'index.php'), new Link('Espace membres', Visitor::getInstance()->getRootPage()."/members/index.php"),
    new Link('Outils de travail','#'), new Link('Les documentationss', '#'), new Link('Fiches bilan', '#')));

include(Visitor::getInstance()->getRootPath().'/views/includes/head.php');
include(Visitor::getInstance()->getRootPath().'/views/members/outils-de-travail/documentations/fiches-bilan.php');
include(Visitor::getInstance()->getRootPath().'/views/includes/foot.php');
?>
