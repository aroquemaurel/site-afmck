<?php
include('begin.php');
use utils\Link;

$title = 'FAQ';
$breadcrumb = new utils\Breadcrumb(array(new Link('home', 'index.php'), new Link('Méthode MDT', '#'), new Link('FAQ','#')));
include('views/includes/head.php');
include('views/01b_meth-faq.php');
include('views/includes/foot.php');
?>
