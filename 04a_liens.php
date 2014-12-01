<?php
//require_once("/home/afmck/www/crawlprotect/include/cppf.php");
require_once('classes/Visitor.php');
require_once('classes/Breadcrumb.php');
require_once('classes/Link.php');
session_start();

$title = 'Liens utiles';
$breadcrumb = new Breadcrumb(array(new Link('home', 'index.php'), new Link('Liens utiles', '#')));
include('views/includes/head.php');
include('views/04a_liens.php');
include('views/includes/foot.php');
?>
