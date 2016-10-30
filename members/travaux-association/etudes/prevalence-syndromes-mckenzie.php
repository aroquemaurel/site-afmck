<?php
include('../../../begin.php');
use utils\Link;

$title = 'Prévalence des syndromes McKenzie';
$breadcrumb = new utils\Breadcrumb(array(new Link('home', 'index.php'), new Link('Espace membres', Visitor::getInstance()->getRootPage()."/members/index.php"),
    new Link('Études','#'), new Link('Prévalence des syndromes McKenzie', '#')));
include(Visitor::getInstance()->getRootPath().'/views/includes/head.php');
include(Visitor::getInstance()->getRootPath().'/views/members/travaux-association/etudes/prevalence-syndromes-mckenzie.php');
include(Visitor::getInstance()->getRootPath().'/views/includes/foot.php');
?>
