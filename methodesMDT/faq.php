<?php
$title = 'FAQ';

include('../begin.php');
use utils\Link;

$breadcrumb = new utils\Breadcrumb(array(new Link('home', 'index.php'), new Link('Méthode MDT', '#'), new Link('FAQ','#')));
include(Visitor::getRootPath().'/views/includes/head.php');
include(Visitor::getRootPath().'/views/methodesMDT/faq.php');
include(Visitor::getRootPath().'/views/includes/foot.php');
?>
