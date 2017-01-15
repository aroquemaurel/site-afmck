<?php
$title = 'Journées de l\'AFMcK — Lille 2015';

include('../../../begin.php');

use utils\Link;

$breadcrumb = new utils\Breadcrumb(array(new Link('home', 'index.php'), new Link('Espace membres', Visitor::getRootPage()."/members/index.php"),
    new Link('Journées de l\'association','#'), new Link('Lille 2015', '#')));
include(Visitor::getRootPath().'/views/includes/head.php');
include(Visitor::getRootPath().'/views/members/travaux-association/journees/lille.php');
include(Visitor::getRootPath().'/views/includes/foot.php');

?>
