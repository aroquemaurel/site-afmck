<?php
//require_once("/home/afmck/www/crawlprotect/include/cppf.php");
require_once('autoload.php');
session_start();

$title = 'Qui sommes nous ?';
$breadcrumb = new Breadcrumb(array(new Link('home', 'index.php'), new Link('AFMcK', '#'), new Link('Qui sommes nous ?','#')));
include('views/includes/head.php');
include('views/02b_afmck-quisomnous.php');
include('views/includes/foot.php');
?>
