<?php
include('../../begin.php');
use utils\Link;

$title = 'La comunication interne';
$breadcrumb = new utils\Breadcrumb(array(new Link('home', 'index.php'), new Link('Espace membres', Visitor::getInstance()->getRootPage()."/members/index.php"),
    new Link('Divers', '#'), new Link('Communication Interne','#')));
include(Visitor::getInstance()->getRootPath().'/views/includes/head.php');
include(Visitor::getInstance()->getRootPath().'/views/members/divers/com-interne.php');
include(Visitor::getInstance()->getRootPath().'/views/includes/foot.php');

?>
