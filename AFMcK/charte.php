<?php
include('../begin.php');
use utils\Link;

$title = 'Charte de l\'association';
$breadcrumb = new utils\Breadcrumb(array(new Link('home', 'index.php'), new Link('AFMcK', '#'), new Link('Charte de l\'association','#')));
include(Visitor::getInstance()->getRootPath().'/views/includes/head.php');
include(Visitor::getInstance()->getRootPath().'/views/AFMcK/charte.php');
include(Visitor::getInstance()->getRootPath().'/views/includes/foot.php');
?>
