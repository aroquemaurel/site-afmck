<?php
include('../../begin.php');
use utils\Link;

$title = 'Newsletters McKenzie International';
$breadcrumb = new utils\Breadcrumb(array(new Link('home', 'index.php'), new Link('Espace membres', Visitor::getInstance()->getRootPage()."/members/index.php"),
    new Link('Le kiosque','#'),  new Link('Newsletters McKenzie International','#')));
include(Visitor::getInstance()->getRootPath().'/views/includes/head.php');
include(Visitor::getInstance()->getRootPath().'/views/members/kiosque/newsletters-McKenzie.php');
include(Visitor::getInstance()->getRootPath().'/views/includes/foot.php');
?>
