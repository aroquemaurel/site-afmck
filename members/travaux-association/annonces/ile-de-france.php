<?php
include('../../../begin.php');

use utils\Link;

$title = 'Annonces de remplacement — île de France';
$breadcrumb = new utils\Breadcrumb(array(new Link('home', 'index.php'), new Link('Espace membres', Visitor::getInstance()->getRootPage()."/members/index.php"),
    new Link('Annonces de remplacement','#'), new Link('Île de France', '#')));
include(Visitor::getInstance()->getRootPath().'/views/includes/head.php');
include(Visitor::getInstance()->getRootPath().'/views/members/travaux-association/annonces/ile-de-france.php');
include(Visitor::getInstance()->getRootPath().'/views/includes/foot.php');

?>
