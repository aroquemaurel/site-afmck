<?php
include('../begin.php');
use utils\Link;

$title = 'Logiciels';
$breadcrumb = new utils\Breadcrumb(array(new Link('home', 'index.php'), new Link('Espace membres', '#'),
    new Link('Outils de travail','#'), new Link('Logiciels', '#')));
include('../views/includes/head.php');
include('../views/members/logiciels.php');
include('../views/includes/foot.php');
?>
