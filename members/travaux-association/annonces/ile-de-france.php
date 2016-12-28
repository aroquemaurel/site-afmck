<?php
include('../../../begin.php');

use utils\Link;

$title = 'Annonces de remplacement — île de France';
$breadcrumb = new utils\Breadcrumb(array(new Link('home', 'index.php'), new Link('Espace membres', Visitor::getRootPage()."/members/index.php"),
    new Link('Annonces de remplacement','#'), new Link('Île de France', '#')));
include(Visitor::getRootPath().'/views/includes/head.php');
include(Visitor::getRootPath().'/views/members/travaux-association/annonces/ile-de-france.php');
include(Visitor::getRootPath().'/views/includes/foot.php');

?>
