<?php
$title = 'La certification';

include('../begin.php');
use utils\Link;
use utils\Rights;

$breadcrumb = new utils\Breadcrumb(array(new Link('home', 'index.php'), new Link('Espace membres', Visitor::getRootPage()."/members/index.php"),
    new Link('La certification','#')));
include('../views/includes/head.php');
include('../views/members/certification.php');
include('../views/includes/foot.php');
?>
