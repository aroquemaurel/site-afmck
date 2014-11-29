<?php
//require_once("/home/afmck/www/crawlprotect/include/cppf.php");
require_once('classes/Visitor.php');
require_once('classes/Breadcrumb.php');
session_start();

$title = 'Prise en charge';
$breadcrumb = new Breadcrumb(array('home', 'Méthode MDT', 'Prise en charge'));
include('views/includes/head.php');
include('views/01a_meth-prisecharge.php');
include('views/includes/foot.php');
?>
