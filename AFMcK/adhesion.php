<?php
include('../begin.php');
use utils\Link;

$title = 'Adhésions';
$breadcrumb = new utils\Breadcrumb(array(new Link('home', 'index.php'), new Link('AFMcK', '#'), new Link('Adhésions','#')));
include(Visitor::getRootPath().'/views/includes/head.php');
include(Visitor::getRootPath().'/views/AFMcK/adhesion.php');
include(Visitor::getRootPath().'/views/includes/foot.php');
?>
