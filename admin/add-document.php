<?php
$particularRights = true;
include('../begin.php');
utils\Rights::hasRights(array("SECRETAIRE", "ADMINISTRATEUR", "TRESORIER"));

use utils\Link;
$title = 'Liste des newsletter';
$breadcrumb = new utils\Breadcrumb(array(new Link('home', 'index.php'), new Link('Espace membres', Visitor::getInstance()->getRootPage()."/members/index.php"),
    new Link('Administration','#'), new Link('Ajouter un document', '#')));

// Add or edit the document
if(isset($_POST['title']) && isset($_POST['subtitle'])) { // → TODO change me
    // TODO : add the document
    header('Location: ' . Visitor::getInstance()->getRootPage().'/admin/add-document.php');
} else {
    include('../views/includes/head.php');
    include('../views/admin/add-document.php');
    include('../views/includes/foot.php');
}
?>

