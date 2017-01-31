<?php
$title = 'Recherche';

include('../begin.php');

use searchers\ArticleSearcher;
use utils\Link;
use searchers\ForumSearcher;

$breadcrumb = new utils\Breadcrumb([new Link('home', 'index.php'), new Link('Espace membres',
                                            Visitor::getInstance()->getRootPage()."/members/index.php"),
                                        new Link('Recherche','#')]);

$search = isset($_GET['search']) ? $_GET['search'] : null;

$forumSearcher = new ForumSearcher();
$articleSearcher = new ArticleSearcher();
$result = array();
if($search != null) {
    $result['forum'] = $forumSearcher->search($search);
    $result['article'] = $articleSearcher->search($search);
}

include('../views/includes/head.php');
include('../views/members/recherche.php');
include('../views/includes/foot.php');
?>
