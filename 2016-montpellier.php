<?php
include('begin.php');

use utils\Link;

$title = 'Journées de l\'AFMcK — Montpellier 2016';
$breadcrumb = new utils\Breadcrumb(array(new Link('home', 'index.php'), new Link('Espace membres', Visitor::getRootPage()."/members/index.php"),
    new Link('Journées de l\'association','#'), new Link('Montpellier 2016', '#')));
include(Visitor::getRootPath().'/views/includes/head.php');
include(Visitor::getRootPath().'/views/members/travaux-association/journees/2016-montpellier.php');
include(Visitor::getRootPath().'/views/includes/foot.php');

?>
