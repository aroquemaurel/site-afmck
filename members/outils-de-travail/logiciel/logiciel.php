<?php
include('../../../begin.php');
use utils\Link;

$title = 'Le logiciel de Bilan MDT';
$breadcrumb = new utils\Breadcrumb(array(new Link('home', 'index.php'), new Link('Espace membres', Visitor::getInstance()->getRootPage()."/members/index.php"),
    new Link('Outils de travail','#'), new Link('Logiciel de Bilan', '#'), new Link('Le logiciel', '#')));
include(Visitor::getInstance()->getRootPath().'/views/includes/head.php');
include(Visitor::getInstance()->getRootPath().'/views/members/outils-de-travail/logiciel/logiciel.php');
include(Visitor::getInstance()->getRootPath().'/views/includes/foot.php');
?>
