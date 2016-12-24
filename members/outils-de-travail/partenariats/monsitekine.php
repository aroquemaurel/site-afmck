<?php
include('../../../begin.php');
use utils\Link;

$title = 'MonSiteKiné';
$breadcrumb = new utils\Breadcrumb(array(new Link('home', 'index.php'), new Link('Espace membres', Visitor::getInstance()->getRootPage()."/members/index.php"),
    new Link('Outils de travail','#'), new Link('Partenariats', '#'), new Link('MonSiteKiné', '#')));
include(Visitor::getInstance()->getRootPath().'/views/includes/head.php');
include(Visitor::getInstance()->getRootPath().'/views/members/outils-de-travail/partenariats/monsitekine.php');
include(Visitor::getInstance()->getRootPath().'/views/includes/foot.php');
?>
