<?php
//require_once("/home/afmck/www/crawlprotect/include/cppf.php");
require_once('autoload.php');
session_start();

$title = 'Adhésions';
$breadcrumb = new Breadcrumb(array(new Link('home', 'index.php'), new Link('AFMcK', '#'), new Link('Adhésions','#')));
include('views/includes/head.php');
include('views/02a_afmck-adhesion.php');
include('views/includes/foot.php');
?>
