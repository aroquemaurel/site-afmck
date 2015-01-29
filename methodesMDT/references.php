<<?php
include('../begin.php');
use utils\Link;

$title = 'Références';
$breadcrumb = new utils\Breadcrumb(array(new Link('home', 'index.php'), new Link('Méthode MDT', '#'), new Link('Références','#')));
include(Visitor::getInstance()->getRootPath().'/views/includes/head.php');
include(Visitor::getInstance()->getRootPath().'/views/methodesMDT/references.php');
include(Visitor::getInstance()->getRootPath().'/views/includes/foot.php');
?>
