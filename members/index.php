<?php
include('../begin.php');
use utils\Link;

$title = 'Accueil membres';
$breadcrumb = new utils\Breadcrumb(array(new Link('home', 'index.php'), new Link('Espace membres', Visitor::getInstance()->getRootPage()."/members/index.php")));

$page = isset($_GET['p']) ? $_GET['p'] : 1;

$news = (new database\DatabaseNews())->getAllNews($page, 2);
$nbPages = round(((new database\DatabaseNews())->getNbNews()+1)/2, 0, PHP_ROUND_HALF_UP);
include('../views/includes/head.php');
include('../views/members/index.php');
include('../views/includes/foot.php');

?>
