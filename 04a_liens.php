<?php
include('begin.php');
use utils\Link;

$title = 'Liens utiles';
$breadcrumb = new utils\Breadcrumb(array(new Link('home', 'index.php'), new Link('Liens utiles', '#')));
include('views/includes/head.php');
include('views/04a_liens.php');
include('views/includes/foot.php');
?>
