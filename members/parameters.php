<?php
include('../begin.php');
use utils\Link;

$title = 'Paramètres';
$breadcrumb = new utils\Breadcrumb(array(new Link('home', 'index.php'), new Link('Espace membres', '#'),
    new Link('Paramètres', '#')));

$editing = true;
include('../views/includes/head.php');
include('../views/members/parameters.php');
include('../views/includes/foot.php');
?>