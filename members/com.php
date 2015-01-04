<?php
include('../begin.php');
use utils\Link;

$title = 'La com\'';
$breadcrumb = new utils\Breadcrumb(array(new Link('home', 'index.php'), new Link('Espace membres', Visitor::getInstance()->getRootPage()."/members/index.php"),
    new Link('Outils de travail','#'), new Link('Les documentationss', '#'), new Link('La com\'', '#')));
include('../views/includes/head.php');
include('../views/members/com.php');
include('../views/includes/foot.php');
?>
