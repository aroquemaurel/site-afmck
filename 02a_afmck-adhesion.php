<?php
include(Visitor::getInstance()->getRootPage().'begin.php');
use utils\Link;

$title = 'Adhésions';
$breadcrumb = new utils\Breadcrumb(array(new Link('home', 'index.php'), new Link('AFMcK', '#'), new Link('Adhésions','#')));
include(Visitor::getInstance()->getRootPath().'/views/includes/head.php');
include(Visitor::getInstance()->getRootPath().'/views/02a_afmck-adhesion.php');
include(Visitor::getInstance()->getRootPath().'/views/includes/foot.php');
?>
