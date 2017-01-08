<?php
$title = 'Liens utiles';

include('begin.php');
use utils\Link;

$breadcrumb = new utils\Breadcrumb(array(new Link('home', 'index.php'), new Link('Liens utiles', '#')));
include(Visitor::getRootPath().'/views/includes/head.php');
include(Visitor::getRootPath().'/views/liens.php');
include(Visitor::getRootPath().'/views/includes/foot.php');
?>
