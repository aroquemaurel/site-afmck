<?php
//require_once("/home/afmck/www/crawlprotect/include/cppf.php");
include('../begin.php');
use utils\Link;

$title = 'Prise en charge';
$breadcrumb = new utils\Breadcrumb(array(new Link('home', 'index.php'), new Link('Méthode MDT', '#'), new Link('Prise en charge','#')));
include(Visitor::getInstance()->getRootPath().'/views/includes/head.php');
include(Visitor::getInstance()->getRootPath().'/views/methodesMDT/prise-en-charge.php');
include(Visitor::getInstance()->getRootPath().'/views/includes/foot.php');
?>