<?php
include('../begin.php');
use utils\Link;

$title = 'Autres cas cliniques';
$breadcrumb = new utils\Breadcrumb(array(new Link('home', 'index.php'), new Link('Espace membres', Visitor::getInstance()->getRootPage()."/members/index.php"),
    new Link('Cas clinique','#'), new Link('Autres cas cliniques', '#')));
include('../views/includes/head.php');
include('../views/members/casclinique_autres.php');
include('../views/includes/foot.php');
?>
