<?php
include('../begin.php');
use utils\Link;

$title = 'Journées de l\'AFMcK — Brest 2012';
$breadcrumb = new utils\Breadcrumb(array(new Link('home', 'index.php'), new Link('Espace membres', Visitor::getInstance()->getRootPage()."/members/index.php"),
    new Link('Journées de l\'association','#'), new Link('Brest 2012', '#')));
include('../views/includes/head.php');
include('../views/members/journees_brest.php');
include('../views/includes/foot.php');

?>
