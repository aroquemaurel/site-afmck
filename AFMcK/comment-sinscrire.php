<?php
include('../begin.php');
use utils\Link;

$title = 'Manuel - Inscription';
$breadcrumb = new utils\Breadcrumb(array(new Link('home', 'index.php'), new Link('AFMcK', '#'), new Link('Comment s\'inscrire','#')));
include(Visitor::getRootPath().'/views/includes/head.php');
include(Visitor::getRootPath().'/views/AFMcK/comment-sinscrire.php');
include(Visitor::getRootPath().'/views/includes/foot.php');
?>

