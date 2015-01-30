<?php
include('../../../begin.php');
use utils\Link;

$title = 'Autres cas cliniques';
$breadcrumb = new utils\Breadcrumb(array(new Link('home', 'index.php'), new Link('Espace membres', Visitor::getInstance()->getRootPage()."/members/index.php"),
    new Link('Cas clinique','#'), new Link('Autres cas cliniques', '#')));
include(Visitor::getInstance()->getRootPath().'/views/includes/head.php');
include(Visitor::getInstance()->getRootPath().'/views/members/travaux-association/cas-cliniques/autres.php');
include(Visitor::getInstance()->getRootPath().'/views/includes/foot.php');
?>
