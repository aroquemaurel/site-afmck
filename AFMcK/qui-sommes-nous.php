<?php
$title = 'Qui sommes nous ?';

include('../begin.php');
use utils\Link;

$breadcrumb = new utils\Breadcrumb(array(new Link('home', 'index.php'), new Link('AFMcK', '#'), new Link('Qui sommes nous ?','#')));
include(Visitor::getRootPath().'/views/includes/head.php');
include(Visitor::getRootPath().'/views/AFMcK/qui-sommes-nous.php');
include(Visitor::getRootPath().'/views/includes/foot.php');
?>
