<?php
include('../begin.php');
use utils\Link;

$title = 'Accueil membres';
$breadcrumb = new utils\Breadcrumb(array(new Link('home', 'index.php'), new Link('Espace membres', '#'),
    new Link('Accueil membres','members/index.php')));
include('../views/includes/head.php');
include('../views/members/index.php');
include('../views/includes/foot.php');

?>
