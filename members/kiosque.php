<?php
include('../begin.php');
use utils\Link;

$title = 'La certification';
$breadcrumb = new utils\Breadcrumb(array(new Link('home', 'index.php'), new Link('Espace membres', '#'),
    new Link('Le kiosque','#')));
include('../views/includes/head.php');
include('../views/members/kiosque.php');
include('../views/includes/foot.php');
?>
