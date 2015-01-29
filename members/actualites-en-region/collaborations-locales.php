<?php
include('../../begin.php');
use utils\Link;

$title = 'Collaborations locales';
$breadcrumb = new utils\Breadcrumb(array(new Link('home', 'index.php'), new Link('Espace membres', Visitor::getInstance()->getRootPage()."/members/index.php"),
    new Link('Actualités en région', '#'), new Link('Collaborations locales','#')));
include(Visitor::getInstance()->getRootPath().'/views/includes/head.php');
include(Visitor::getInstance()->getRootPath().'/views/members/actualites-en-region/collaborations-locales.php');
include(Visitor::getInstance()->getRootPath().'/views/includes/foot.php');

?>
