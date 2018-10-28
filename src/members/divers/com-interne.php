<?php
$title = 'La comunication interne';

include('../../begin.php');
use utils\Link;

$breadcrumb = new utils\Breadcrumb(array(new Link('home', 'index.php'), new Link('Espace membres', Visitor::getRootPage()."/members/index.php"),
    new Link('Divers', '#'), new Link('Communication Interne','#')));
include(Visitor::getRootPath().'/views/includes/head.php');
include(Visitor::getRootPath().'/views/members/divers/com-interne.php');
include(Visitor::getRootPath().'/views/includes/foot.php');

?>
