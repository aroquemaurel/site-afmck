<?php
//require_once("/home/afmck/www/crawlprotect/include/cppf.php");
require_once('classes/Visitor.php');
require_once('classes/Breadcrumb.php');
require_once('classes/Link.php');
session_start();

$title = 'Charte de l\'association';
$breadcrumb = new Breadcrumb(array(new Link('home', 'index.php'), new Link('AFMcK', '#'), new Link('Charte de l\'association','#')));
include('views/includes/head.php');
include('views/02b_afmck-charte.php');
include('views/includes/foot.php');
?>
