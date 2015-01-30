<?php
include('../../../begin.php');
use utils\Link;

$title = 'Journées de l\'AFMcK — Brest 2012';
$breadcrumb = new utils\Breadcrumb(array(new Link('home', 'index.php'), new Link('Espace membres', Visitor::getInstance()->getRootPage()."/members/index.php"),
    new Link('Journées de l\'association','#'), new Link('Brest 2012', '#')));
include(Visitor::getInstance()->getRootPath().'/views/includes/head.php');
include(Visitor::getInstance()->getRootPath().'/views/members/travaux-association/journees/brest.php');
include(Visitor::getInstance()->getRootPath().'/views/includes/foot.php');

?>
