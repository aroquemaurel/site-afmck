<?php
include('../../../begin.php');
use utils\Link;

$title = 'Obtenir la clé de déverrouillage';
$breadcrumb = new utils\Breadcrumb(array(new Link('home', 'index.php'), new Link('Espace membres', Visitor::getRootPage()."/members/index.php"),
    new Link('Outils de travail','#'), new Link('Logiciel de Bilan', '#'), new Link('Obtenir la clé de déverrouillage', '#')));
include(Visitor::getRootPath().'/views/includes/head.php');
include(Visitor::getRootPath().'/views/members/outils-de-travail/logiciel/cle-deverrouillage.php');
include(Visitor::getRootPath().'/views/includes/foot.php');
?>
