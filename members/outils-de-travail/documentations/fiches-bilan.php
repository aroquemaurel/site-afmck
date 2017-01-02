<?php
include('../../../begin.php');
use utils\Link;

$title = 'Fiches bilan';
$breadcrumb = new utils\Breadcrumb(array(new Link('home', 'index.php'), new Link('Espace membres', Visitor::getRootPage()."/members/index.php"),
    new Link('Outils de travail','#'), new Link('Les documentationss', '#'), new Link('Fiches bilan', '#')));

include(Visitor::getRootPath().'/views/includes/head.php');
include(Visitor::getRootPath().'/views/members/outils-de-travail/documentations/fiches-bilan.php');
include(Visitor::getRootPath().'/views/includes/foot.php');
?>
