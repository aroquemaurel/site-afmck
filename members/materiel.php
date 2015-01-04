<?php
include('../begin.php');
use utils\Link;

$title = 'Le matériel';
$breadcrumb = new utils\Breadcrumb(array(new Link('home', 'index.php'), new Link('Espace membres', Visitor::getInstance()->getRootPage()."/members/index.php"),
    new Link('Outils de travail','#'), new Link('Le matériel', '#')));
include('../views/includes/head.php');
include('../views/members/materiel.php');
include('../views/includes/foot.php');
?>
