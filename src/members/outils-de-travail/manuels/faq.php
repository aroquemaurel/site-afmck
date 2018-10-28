<?php
$title = 'Manuel — Foire aux Questions';

include('../../../begin.php');
use utils\Link;

$breadcrumb = new utils\Breadcrumb(array(new Link('home', 'index.php'), new Link('Espace membres', Visitor::getRootPage()."/members/index.php"),
    new Link('Outils de travail','#'), new Link('Manuels', '#'), new Link('Foire aux questions', '#')));
include(Visitor::getRootPath().'/views/includes/head.php');
include(Visitor::getRootPath().'/views/members/outils-de-travail/manuels/faq.php');
include(Visitor::getRootPath().'/views/includes/foot.php');
?>

