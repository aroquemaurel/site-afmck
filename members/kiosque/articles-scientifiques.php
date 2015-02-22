<?php
include('../../begin.php');
use utils\Link;

$title = 'La certification';
$breadcrumb = new utils\Breadcrumb(array(new Link('home', 'index.php'), new Link('Espace membres', Visitor::getInstance()->getRootPage()."/members/index.php"),
    new Link('Le kiosque','#')));
include(Visitor::getInstance()->getRootPath().'/views/includes/head.php');
include(Visitor::getInstance()->getRootPath().'/views/members/kiosque/articles-scientifiques.php');
include(Visitor::getInstance()->getRootPath().'/views/includes/foot.php');
?>
