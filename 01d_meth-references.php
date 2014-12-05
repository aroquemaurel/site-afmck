<?php
//require_once("/home/afmck/www/crawlprotect/include/cppf.php");
require_once('autoload.php');

session_start();

$title = 'Références';
$breadcrumb = new Breadcrumb(array(new Link('home', 'index.php'), new Link('Méthode MDT', '#'), new Link('Références','#')));
include('views/includes/head.php');
include('views/01d_meth-references.php');
include('views/includes/foot.php');
?>
