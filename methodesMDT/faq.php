<?php
include('../begin.php');
use utils\Link;

$title = 'FAQ';
$breadcrumb = new utils\Breadcrumb(array(new Link('home', 'index.php'), new Link('Méthode MDT', '#'), new Link('FAQ','#')));
include(Visitor::getInstance()->getRootPath().'/views/includes/head.php');
include(Visitor::getInstance()->getRootPath().'/views/methodesMDT/faq.php');
include(Visitor::getInstance()->getRootPath().'/views/includes/foot.php');
?>
