<?php
$title = 'Ma clé de déverrouillage';

include('../../../begin.php');
use database\DatabaseLicense;
use utils\Link;

$breadcrumb = new utils\Breadcrumb(array(new Link('home', 'index.php'), new Link('Espace membres', Visitor::getRootPage()."/members/index.php"),
    new Link('Outils de travail','#'), new Link('Logiciel de Bilan', '#'), new Link('Déverrouillage du logiciel', '#')));

$db = new DatabaseLicense();
$license = new License(Visitor::getInstance()->getUser());
$license->commit(); // Add new license in database if necessary


include(Visitor::getRootPath().'/views/includes/head.php');
include(Visitor::getRootPath().'/views/members/outils-de-travail/logiciel/obtenir-ma-cle.php');
include(Visitor::getRootPath().'/views/includes/foot.php');

?>
