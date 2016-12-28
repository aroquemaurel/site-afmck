<?php
include('../begin.php');

use utils\Link;
use searchers\ForumSearcher;

$title = 'Recherche';
$breadcrumb = new utils\Breadcrumb([new Link('home', 'index.php'), new Link('Espace membres',
                                            Visitor::getInstance()->getRootPage()."/members/index.php"),
                                        new Link('Recherche','#')]);

$search = isset($_GET['search']) ? $_GET['search'] : null;

$searcher = new ForumSearcher();
$result = array();
if($search != null) {
    $result = $searcher->search($search);
}

include('../views/includes/head.php');
include('../views/members/recherche.php');
include('../views/includes/foot.php');
?>