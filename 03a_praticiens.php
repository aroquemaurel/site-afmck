<?php
//require_once("/home/afmck/www/crawlprotect/include/cppf.php");
require_once('classes/Visitor.php');
require_once('classes/Breadcrumb.php');
require_once('classes/Link.php');
session_start();

$title = 'Praticiens';
$breadcrumb = new Breadcrumb(array(new Link('home', 'index.php'), new Link('Praticiens', '#')));
include('views/includes/head.php');
include('views/03a_praticiens.php');
include('views/includes/foot.php');
?>
