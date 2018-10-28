<?php
$title = 'Généralités sur le MDT';

include('../../begin.php');
use utils\Link;

$breadcrumb = new utils\Breadcrumb(array(new Link('home', 'index.php'), new Link('Espace membres', Visitor::getRootPage()."/members/index.php"),
    new Link('Le kiosque','#')));
include(Visitor::getRootPath().'/views/includes/head.php');
include(Visitor::getRootPath().'/views/members/kiosque/generalites-mdt.php');
include(Visitor::getRootPath().'/views/includes/foot.php');
?>
