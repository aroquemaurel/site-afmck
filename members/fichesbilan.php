<?php
include('../begin.php');
use utils\Link;

$title = 'Fiches bilan';
$breadcrumb = new utils\Breadcrumb(array(new Link('home', 'index.php'), new Link('Espace membres', Visitor::getInstance()->getRootPage()."/members/index.php"),
    new Link('Outils de travail','#'), new Link('Les documentationss', '#'), new Link('Fiches bilan', '#')));

include('../views/includes/head.php');
include('../views/members/fichesbilan.php');
include('../views/includes/foot.php');
?>
