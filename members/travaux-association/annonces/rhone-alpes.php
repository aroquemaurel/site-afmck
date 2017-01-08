<?php
$title = 'Annonces de remplacement — Rhône-Alpes';

include('../../../begin.php');

use utils\Link;

$breadcrumb = new utils\Breadcrumb(array(new Link('home', 'index.php'), new Link('Espace membres', Visitor::getRootPage()."/members/index.php"),
    new Link('Annonces de remplacement','#'), new Link('Rhône-Alpes', '#')));
include(Visitor::getRootPath().'/views/includes/head.php');
include(Visitor::getRootPath().'/views/members/travaux-association/annonces/rhone-alpes.php');
include(Visitor::getRootPath().'/views/includes/foot.php');

?>
