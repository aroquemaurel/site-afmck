<?php
include('../begin.php');
use utils\Link;

$title = 'Newsletters McKenzie International';
$breadcrumb = new utils\Breadcrumb(array(new Link('home', 'index.php'), new Link('Espace membres', Visitor::getInstance()->getRootPage()."/members/index.php"),
    new Link('Le kiosque','#'),  new Link('Newsletters McKenzie International','#')));
include('../views/includes/head.php');
include('../views/members/newsletters.php');
include('../views/includes/foot.php');
?>
