<?php
//require_once("/home/afmck/www/crawlprotect/include/cppf.php");
require_once('classes/Visitor.php');
require_once('classes/Breadcrumb.php');
require_once('classes/Link.php');
session_start();

$title = 'Formation';
$breadcrumb = new Breadcrumb(array(new Link('home', 'index.php'), new Link('Méthode MDT', '#'), new Link('Formation','#')));
include('views/includes/head.php');
include('views/01c_meth-formation.php');
include('views/includes/foot.php');
?>