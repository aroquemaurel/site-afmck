<?php
use utils\Breadcrumb;
use utils\Link;

include('../../begin.php');

$title = 'Afficher la newsletter';
$breadcrumb = new Breadcrumb([new Link('home', 'index.php'),
    new Link('Espace membres', Visitor::getRootPage()."/members/index.php"),
    new Link('Liste des newsletters', Visitor::getRootPage().'/members/newsletters/index.php'),
    new Link('Lire une newsletter', '#')]);

if(isset($_GET['id'])) {
    $db = new \database\DatabaseNews();
    $new = $db->getNew($_GET['id']);
}
if(!isset($new) || $new == null) {
    $_SESSION['lastMessage'] = Popup::errorMessage("La newsletter est introuvable");
    header('Location: ' . 'index.php');
    exit();
}

include('../../views/includes/head.php');
include('../../views/members/newsletters/voir.php');
include('../../views/includes/foot.php');
?>