<?php
$title = 'Charte de l\'association';

include('../begin.php');
use utils\Link;

$breadcrumb = new utils\Breadcrumb(array(new Link('home', 'index.php'), new Link('AFMcK', '#'), new Link('Charte de l\'association','#')));
include(Visitor::getRootPath().'/views/includes/head.php');
include(Visitor::getRootPath().'/views/AFMcK/charte.php');
include(Visitor::getRootPath().'/views/includes/foot.php');
?>
