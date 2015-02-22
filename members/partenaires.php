<?php
include('../begin.php');
use utils\Link;

$title = 'Partenaires';
$breadcrumb = new utils\Breadcrumb(array(new Link('home', 'index.php'), new Link('Espace membres', Visitor::getInstance()->getRootPage()."/members/index.php"),
    new Link('Divers', '#'), new Link('Partenaires','#')));
include('../views/includes/head.php');
include('../views/members/partenaires.php');
include('../views/includes/foot.php');
?>