<?php
include('../../../begin.php');
use utils\Link;

$title = 'La com\'';
$breadcrumb = new utils\Breadcrumb(array(new Link('home', 'index.php'), new Link('Espace membres', Visitor::getRootPage()."/members/index.php"),
    new Link('Outils de travail','#'), new Link('Les documentationss', '#'), new Link('La com\'', '#')));
include(Visitor::getRootPath().'/views/includes/head.php');
include(Visitor::getRootPath().'/views/members/outils-de-travail/documentations/com.php');
include(Visitor::getRootPath().'/views/includes/foot.php');
?>
