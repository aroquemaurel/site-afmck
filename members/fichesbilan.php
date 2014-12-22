<?php
include('../begin.php');
use utils\Link;

$title = 'Accueil membres';
$breadcrumb = new utils\Breadcrumb(array(new Link('home', 'index.php'), new Link('Espace membres', '#'),
    new Link('Outils de travail','#'), new Link('Les docs', '#'), new Link('Fiches bilan', '#')));

include('../views/includes/head.php');
include('../views/members/fichesbilan.php');
include('../views/includes/foot.php');
?>
