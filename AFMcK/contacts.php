<?php
$title = 'Contact';

include('../begin.php');
use utils\Link;

$breadcrumb = new utils\Breadcrumb(array(new Link('home', 'index.php'), new Link('AFMcK', '#'), new Link('Contact','#')));
include(Visitor::getRootPath().'/views/includes/head.php');
include(Visitor::getRootPath().'/views/AFMcK/contacts.php');
include(Visitor::getRootPath().'/views/includes/foot.php');
?>

