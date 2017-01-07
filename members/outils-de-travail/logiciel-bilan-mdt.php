<?php
include('../../begin.php');
use utils\Link;

$title = 'Le logiciel de bilan MDT';
$breadcrumb = new utils\Breadcrumb(array(new Link('home', 'index.php'), new Link('Espace membres', Visitor::getRootPage()."/members/index.php"),
    new Link('Outils de travail','#'), new Link($title, '#')));
include(Visitor::getRootPath().'/views/includes/head.php');
include(Visitor::getRootPath().'/views/members/outils-de-travail/logiciel-bilan-mdt.php');
include(Visitor::getRootPath().'/views/includes/foot.php');
?>
