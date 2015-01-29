<?php
include(Visitor::getInstance()->getRootPage().'begin.php');
use utils\Link;

$title = 'Praticiens';
$breadcrumb = new utils\Breadcrumb(array(new Link('home', 'index.php'), new Link('Praticiens', '#')));
include(Visitor::getInstance()->getRootPath().'/views/includes/head.php');
include(Visitor::getInstance()->getRootPath().'/views/03a_praticiens.php');
include(Visitor::getInstance()->getRootPath().'/views/includes/foot.php');
?>
