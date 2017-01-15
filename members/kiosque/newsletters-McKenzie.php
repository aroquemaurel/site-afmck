<?php
$title = 'Newsletters McKenzie International';

include('../../begin.php');
use utils\Link;

$breadcrumb = new utils\Breadcrumb(array(new Link('home', 'index.php'), new Link('Espace membres', Visitor::getRootPage()."/members/index.php"),
    new Link('Le kiosque','#'),  new Link('Newsletters McKenzie International','#')));
include(Visitor::getRootPath().'/views/includes/head.php');
include(Visitor::getRootPath().'/views/members/kiosque/newsletters-McKenzie.php');
include(Visitor::getRootPath().'/views/includes/foot.php');
?>
