<?php
include('../begin.php');
use utils\Link;

$title = 'Contact';
$breadcrumb = new utils\Breadcrumb(array(new Link('home', 'index.php'), new Link('AFMcK', '#'), new Link('Contact','#')));
include(Visitor::getInstance()->getRootPath().'/views/includes/head.php');
include(Visitor::getInstance()->getRootPath().'/views/AFMcK/contacts.php');
include(Visitor::getInstance()->getRootPath().'/views/includes/foot.php');
?>

