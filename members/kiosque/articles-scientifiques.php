<?php
include('../../begin.php');
use utils\Link;

$title = 'La certification';
$breadcrumb = new utils\Breadcrumb(array(new Link('home', 'index.php'), new Link('Espace membres', Visitor::getRootPage()."/members/index.php"),
    new Link('Le kiosque','#')));
include(Visitor::getRootPath().'/views/includes/head.php');
include(Visitor::getRootPath().'/views/members/kiosque/articles-scientifiques.php');
include(Visitor::getRootPath().'/views/includes/foot.php');
?>
