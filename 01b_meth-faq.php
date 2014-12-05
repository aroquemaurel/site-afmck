<?php
//require_once("/home/afmck/www/crawlprotect/include/cppf.php");
require_once('autoload.php');
session_start();

$title = 'FAQ';
$breadcrumb = new Breadcrumb(array(new Link('home', 'index.php'), new Link('Méthode MDT', '#'), new Link('FAQ','#')));
include('views/includes/head.php');
include('views/01b_meth-faq.php');
include('views/includes/foot.php');
?>
