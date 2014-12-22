<?php
//require_once("/home/afmck/www/crawlprotect/include/cppf.php");
include('begin.php');
use utils\Link;

$title = 'Prise en charge';
$breadcrumb = new utils\Breadcrumb(array(new Link('home', 'index.php'), new Link('Méthode MDT', '#'), new Link('Prise en charge','#')));
include('views/includes/head.php');
include('views/01a_meth-prisecharge.php');
include('views/includes/foot.php');
?>