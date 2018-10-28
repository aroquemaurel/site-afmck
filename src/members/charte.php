<?php
$title = 'La charte AFMcK';

include('../begin.php');
use utils\Link;

$breadcrumb = new utils\Breadcrumb(array(new Link('home', 'index.php'), new Link('Espace membres', Visitor::getRootPage()."/members/index.php"),
    new Link('Divers', '#'), new Link('Communication Interne','#')));
include('../views/includes/head.php');
include('../views/members/charte.php');
include('../views/includes/foot.php');

?>