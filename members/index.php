<?php
$title = 'Accueil membres';

include('../begin.php');
use utils\Link;

$title = 'Accueil membres';
$breadcrumb = new utils\Breadcrumb(array(new Link('home', 'index.php'), new Link('Espace membres', Visitor::getRootPage()."/members/index.php")));

$page = isset($_GET['p']) ? $_GET['p'] : 1;

$listNews = (new database\DatabaseNews())->getAllNews(1, 6);
$lastNew = (new database\DatabaseNews())->getLastNew();
$nbPages = round(((new database\DatabaseNews())->getNbNews()+1)/2, 0, PHP_ROUND_HALF_UP);
include('../views/includes/head.php');
include('../views/members/index.php');
include('../views/includes/foot.php');

?>
