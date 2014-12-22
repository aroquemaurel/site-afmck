<?php
include('begin.php');
use utils\Link;

$title = 'Inscription';
$breadcrumb = new utils\Breadcrumb(array(new Link('home', 'index.php'), new Link('Inscription', '#')));
include('views/includes/head.php');
include('views/inscription.php');
include('views/includes/foot.php');
?>
