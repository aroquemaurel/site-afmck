<?php
$title = 'Prise en charge';

include('../begin.php');
use utils\Link;

$breadcrumb = new utils\Breadcrumb(array(new Link('home', 'index.php'), new Link('Méthode MDT', '#'), new Link('Prise en charge','#')));
include(Visitor::getRootPath().'/views/includes/head.php');
include(Visitor::getRootPath().'/views/methodesMDT/prise-en-charge.php');
include(Visitor::getRootPath().'/views/includes/foot.php');
?>