<?php
include('begin.php');
use utils\Link;

$title = 'Liens utiles';
$breadcrumb = new utils\Breadcrumb(array(new Link('home', 'index.php'), new Link('Liens utiles', '#')));
include(Visitor::getInstance()->getRootPath().'/views/includes/head.php');
include(Visitor::getInstance()->getRootPath().'/views/liens.php');
include(Visitor::getInstance()->getRootPath().'/views/includes/foot.php');
?>
