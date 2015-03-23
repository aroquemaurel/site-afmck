<?php
include('../begin.php');
use utils\Link;

$title = 'Accueil membres';
$breadcrumb = new utils\Breadcrumb(array(new Link('home', 'index.php'), new Link('Espace membres', Visitor::getInstance()->getRootPage()."/members/index.php")));

$page = isset($_GET['p']) ? $_GET['p'] : 1;

$news = (new DatabaseNews())->getAllNews($page);
$nbPages = round((new DatabaseNews())->getNbNews()/2, 0, PHP_ROUND_HALF_UP);
include('../views/includes/head.php');
include('../views/members/index.php');
include('../views/includes/foot.php');

?>
