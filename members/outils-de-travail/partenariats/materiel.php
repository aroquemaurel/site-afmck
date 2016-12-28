<?php
include('../../../begin.php');
use utils\Link;

$title = 'Le matériel';
$breadcrumb = new utils\Breadcrumb(array(new Link('home', 'index.php'), new Link('Espace membres', Visitor::getRootPage()."/members/index.php"),
    new Link('Outils de travail','#'), new Link('Partenariats', '#'), new Link('Le matériel', '#')));
include(Visitor::getRootPath().'/views/includes/head.php');
include(Visitor::getRootPath().'/views/members/outils-de-travail/partenariats/materiel.php');
include(Visitor::getRootPath().'/views/includes/foot.php');
?>
