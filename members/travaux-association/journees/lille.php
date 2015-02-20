<?php
include('../../../begin.php');

use utils\Link;

$title = 'Journées de l\'AFMcK — Lille 2015';
$breadcrumb = new utils\Breadcrumb(array(new Link('home', 'index.php'), new Link('Espace membres', Visitor::getInstance()->getRootPage()."/members/index.php"),
    new Link('Journées de l\'association','#'), new Link('Lille 2015', '#')));
include(Visitor::getInstance()->getRootPath().'/views/includes/head.php');
include(Visitor::getInstance()->getRootPath().'/views/members/travaux-association/journees/lille.php');
include(Visitor::getInstance()->getRootPath().'/views/includes/foot.php');

?>
