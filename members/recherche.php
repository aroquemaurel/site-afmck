<?php
include('../begin.php');

use utils\Link;
use searchers\ForumSearcher;

$title = 'Recherche';
$breadcrumb = new utils\Breadcrumb([new Link('home', 'index.php'), new Link('Espace membres',
                                            Visitor::getInstance()->getRootPage()."/members/index.php"),
                                        new Link('Recherche','#')]);
$searcher = new ForumSearcher();
print_r($searcher->search("test"));
//include('../views/includes/head.php');
//include('../views/members/partenaires.php');
//include('../views/includes/foot.php');
?>