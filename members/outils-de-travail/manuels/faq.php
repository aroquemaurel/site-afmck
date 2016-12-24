<?php
include('../../../begin.php');
use utils\Link;

$title = 'Manuel — Foire aux Questions';
$breadcrumb = new utils\Breadcrumb(array(new Link('home', 'index.php'), new Link('Espace membres', Visitor::getInstance()->getRootPage()."/members/index.php"),
    new Link('Outils de travail','#'), new Link('Manuels', '#'), new Link('Foire aux questions', '#')));
include(Visitor::getInstance()->getRootPath().'/views/includes/head.php');
include(Visitor::getInstance()->getRootPath().'/views/members/outils-de-travail/manuels/faq.php');
include(Visitor::getInstance()->getRootPath().'/views/includes/foot.php');
?>

