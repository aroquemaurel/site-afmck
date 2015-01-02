<<?php
include('begin.php');
use utils\Link;

$title = 'Références';
$breadcrumb = new utils\Breadcrumb(array(new Link('home', 'index.php'), new Link('Méthode MDT', '#'), new Link('Références','#')));
include('views/includes/head.php');
include('views/01d_meth-references.php');
include('views/includes/foot.php');
?>
