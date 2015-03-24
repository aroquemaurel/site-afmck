<?php
include('../begin.php');
utils\Rights::hasRights(array("SECRETAIRE", "ADMINISTRATEUR"));

use utils\Link;
$title = 'Liste des news';
$breadcrumb = new utils\Breadcrumb(array(new Link('home', 'index.php'), new Link('Espace membres', Visitor::getInstance()->getRootPage()."/members/index.php"),
    new Link('Administration','#'), new Link('Liste des news', '#')));

$page = isset($_GET['p']) ? $_GET['p'] : 1;
$news = (new DatabaseNews())->getAllNews($page, 12);
$nbPages = round(((new DatabaseNews())->getNbNews()+1)/12, 0, PHP_ROUND_HALF_UP);

include('../views/includes/head.php');
include('../views/admin/list-news.php');
include('../views/includes/foot.php');
?>

