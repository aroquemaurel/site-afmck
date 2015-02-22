<?php
include ('../begin.php');
use utils\Link;

$title = 'Formation';
$breadcrumb = new utils\Breadcrumb(array(new Link('home', 'index.php'), new Link('Méthode MDT', '#'), new Link('Formation','#')));
include(Visitor::getInstance()->getRootPath().'/views/includes/head.php');
include(Visitor::getInstance()->getRootPath().'/views/methodesMDT/formation.php');
include(Visitor::getInstance()->getRootPath().'/views/includes/foot.php');
?>