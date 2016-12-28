<?php
include('../../../begin.php');
use utils\Link;

$title = 'Cas clinique rotulienne';
$breadcrumb = new utils\Breadcrumb(array(new Link('home', 'index.php'), new Link('Espace membres', Visitor::getRootPage()."/members/index.php"),
    new Link('Cas clinique','#'), new Link('Tendinite Rotulienne', '#')));
include(Visitor::getRootPath().'/views/includes/head.php');
include(Visitor::getRootPath().'/views/members/travaux-association/cas-cliniques/rotulienne.php');
include(Visitor::getRootPath().'/views/includes/foot.php');
?>
