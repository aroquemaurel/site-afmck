<?php
include(Visitor::getInstance()->getRootPage().'begin.php');
use utils\Link;

$title = 'Qui sommes nous ?';
$breadcrumb = new utils\Breadcrumb(array(new Link('home', 'index.php'), new Link('AFMcK', '#'), new Link('Qui sommes nous ?','#')));
include(Visitor::getInstance()->getRootPath().'/views/includes/head.php');
include(Visitor::getInstance()->getRootPath().'/views/02b_afmck-quisomnous.php');
include(Visitor::getInstance()->getRootPath().'/views/includes/foot.php');
?>
