<?php
include('../../../begin.php');

use utils\Link;

$title = 'Journées de l\'AFMcK — Lyon 2013';
$breadcrumb = new utils\Breadcrumb(array(new Link('home', 'index.php'), new Link('Espace membres', Visitor::getInstance()->getRootPage()."/members/index.php"),
    new Link('Journées de l\'association','#'), new Link('Lyon 2013', '#')));
include(Visitor::getInstance()->getRootPath().'/views/includes/head.php');
include(Visitor::getInstance()->getRootPath().'/views/members/travaux-association/journees/lyon.php');
include(Visitor::getInstance()->getRootPath().'/views/includes/foot.php');

?>
