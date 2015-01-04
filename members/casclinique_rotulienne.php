<?php
include('../begin.php');
use utils\Link;

$title = 'Cas clinique rotulienne';
$breadcrumb = new utils\Breadcrumb(array(new Link('home', 'index.php'), new Link('Espace membres', Visitor::getInstance()->getRootPage()."/members/index.php"),
    new Link('Cas clinique','#'), new Link('Tendinite Rotulienne', '#')));
include('../views/includes/head.php');
include('../views/members/casclinique_rotulienne.php');
include('../views/includes/foot.php');
?>
