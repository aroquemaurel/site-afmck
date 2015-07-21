<?php
$particularRights = true;
include('../begin.php');
utils\Rights::hasRights(array("MEMBRE_CA", "ADMINISTRATEUR"));

use utils\Link;
$title = 'Liste des documents';
$breadcrumb = new utils\Breadcrumb(array(new Link('home', 'index.php'), new Link('Espace membres', Visitor::getInstance()->getRootPage()."/members/index.php"),
    new Link('Administration','#'), new Link('Liste des documents', '#')));

$db = new DatabaseDocuments();
$docs = $db->getAllDocuments();
include('../views/includes/head.php');
include('../views/CA/liste-des-documents.php');
include('../views/includes/foot.php');
?>

