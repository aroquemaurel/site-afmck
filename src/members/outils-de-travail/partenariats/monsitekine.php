<?php
$title = 'MonSiteKiné';

include('../../../begin.php');
use utils\Link;

$breadcrumb = new utils\Breadcrumb(array(new Link('home', 'index.php'), new Link('Espace membres', Visitor::getRootPage()."/members/index.php"),
    new Link('Outils de travail','#'), new Link('Partenariats', '#'), new Link('MonSiteKiné', '#')));
include(Visitor::getRootPath().'/views/includes/head.php');
include(Visitor::getRootPath().'/views/members/outils-de-travail/partenariats/monsitekine.php');
include(Visitor::getRootPath().'/views/includes/foot.php');
?>
