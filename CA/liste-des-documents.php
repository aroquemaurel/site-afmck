<?php
$particularRights = true;
include('../begin.php');
utils\Rights::hasRights(array("MEMBRE_CA", "ADMINISTRATEUR"));

use database\DatabaseDocuments;
use utils\Link;
$title = 'Liste des documents';
$breadcrumb = new utils\Breadcrumb(array(new Link('home', 'index.php'), new Link('Espace membres', Visitor::getInstance()->getRootPage()."/members/index.php"),
    new Link('Administration','#'), new Link('Liste des documents', '#')));

$db = new DatabaseDocuments();
if(isset($_GET['d']) && isset($_GET['remove'])) { // we remove a doc
    $db->removeDocument($_GET['d']);
}

$docs = $db->getAllDocuments();
include('../views/includes/head.php');
include('../views/CA/liste-des-documents.php');
include('../views/includes/foot.php');
?>

