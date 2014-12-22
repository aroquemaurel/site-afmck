<?php
include('begin.php');
use utils\Link;

$title = 'Praticiens';
$breadcrumb = new utils\Breadcrumb(array(new Link('home', 'index.php'), new Link('Praticiens', '#')));
include('views/includes/head.php');
include('views/03a_praticiens.php');
include('views/includes/foot.php');
?>
