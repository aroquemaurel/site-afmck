<?php
use utils\Breadcrumb;
use utils\Link;
$title = 'Liste des newsletters';

include('../../begin.php');

$breadcrumb = new Breadcrumb([new Link('home', 'index.php'),
    new Link('Espace membres', Visitor::getRootPage()."/members/index.php"),
    new Link('Liste des newsletters', '#')]);

    $db = new \database\DatabaseNews();
    if(isset($_GET['page'])) {
        $page = $_GET['page'];
    } else {
        $page = 1;
    }

    $news = $db->getAllNews($page, 15);


if(!isset($news)) {
    $_SESSION['lastMessage'] = Popup::errorMessage("Erreur dans le chargement des newsletters.");
    header('Location: ' . Visitor::getRootPage().'/members/index.php');
    exit();
}

include('../../views/includes/head.php');
include('../../views/members/newsletters/index.php');
include('../../views/includes/foot.php');
?>